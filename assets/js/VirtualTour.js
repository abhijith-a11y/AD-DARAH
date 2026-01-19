/**
 * Virtual Tour Component
 * 
 * Handles 360-degree panorama viewer using Marzipano with tiled cube maps
 */

(function() {
    'use strict';

    let viewer = null;
    let scenes = [];
    let currentSceneIndex = 0;

    /**
     * Initialize Virtual Tour
     */
    const initVirtualTour = function() {
        const viewerContainer = document.getElementById('virtualTourViewer');

        if (!viewerContainer) {
            console.warn('Virtual Tour: Container not found');
            return;
        }

        // Wait for Marzipano and data to be available
        if (typeof window.marzipano === 'undefined' || typeof window.VIRTUAL_TOUR_DATA === 'undefined') {
            setTimeout(initVirtualTour, 100);
            return;
        }

        const Marzipano = window.marzipano;
        const data = window.VIRTUAL_TOUR_DATA;

        // Get template URI from data attribute
        const templateUri = viewerContainer.getAttribute('data-template-uri') || 
                           (window.location.origin + '/wp-content/themes/AD-DARAH');
        
        // Viewer options
        const viewerOpts = {
            controls: {
                mouseViewMode: data.settings.mouseViewMode || 'drag'
            }
        };

        // Initialize viewer
        viewer = new Marzipano.Viewer(viewerContainer, viewerOpts);

        // Create scenes from data
        scenes = data.scenes.map(function(sceneData) {
            const urlPrefix = templateUri + "/assets/images/tiles";
            const source = Marzipano.ImageUrlSource.fromString(
                urlPrefix + "/" + sceneData.id + "/{z}/{f}/{y}/{x}.jpg",
                { cubeMapPreviewUrl: urlPrefix + "/" + sceneData.id + "/preview.jpg" }
            );
            const geometry = new Marzipano.CubeGeometry(sceneData.levels);

            const limiter = Marzipano.RectilinearView.limit.traditional(
                sceneData.faceSize, 
                100 * Math.PI / 180, 
                120 * Math.PI / 180
            );
            const view = new Marzipano.RectilinearView(sceneData.initialViewParameters, limiter);

            const scene = viewer.createScene({
                source: source,
                geometry: geometry,
                view: view,
                pinFirstLevel: true
            });

            return {
                data: sceneData,
                scene: scene,
                view: view
            };
        });

        // Setup navigation buttons
        setupNavigation();

        // Display the initial scene
        if (scenes.length > 0) {
            switchScene(scenes[0]);
        }
    };

    /**
     * Switch to a scene
     */
    const switchScene = function(scene) {
        scene.view.setParameters(scene.data.initialViewParameters);
        scene.scene.switchTo({
            transitionDuration: 1000
        });
        currentSceneIndex = scenes.indexOf(scene);
    };

    /**
     * Switch to next panorama
     */
    const nextPanorama = function() {
        if (scenes.length === 0) return;
        currentSceneIndex = (currentSceneIndex + 1) % scenes.length;
        switchScene(scenes[currentSceneIndex]);
    };

    /**
     * Switch to previous panorama
     */
    const prevPanorama = function() {
        if (scenes.length === 0) return;
        currentSceneIndex = (currentSceneIndex - 1 + scenes.length) % scenes.length;
        switchScene(scenes[currentSceneIndex]);
    };

    /**
     * Setup navigation buttons
     */
    const setupNavigation = function() {
        const prevBtn = document.getElementById('virtualTourPrev');
        const nextBtn = document.getElementById('virtualTourNext');

        if (prevBtn) {
            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                prevPanorama();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                nextPanorama();
            });
        }
    };

    /**
     * Initialize on DOM ready
     */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initVirtualTour);
    } else {
        initVirtualTour();
    }

})();
