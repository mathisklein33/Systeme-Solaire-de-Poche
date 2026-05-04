<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système solaire AR animé</title>
    <script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/AR-js-org/AR.js/aframe/build/aframe-ar.js"></script>
</head>
<body style="margin:0; overflow:hidden;">

<a-scene
        embedded
        vr-mode-ui="enabled: false"
        renderer="logarithmicDepthBuffer: true;"
        arjs="sourceType: webcam; debugUIEnabled: false; detectionMode: mono;">

    <a-marker
            type="pattern"
            url="<?= ASSETS_URL ?>markers/pattern-systeme-sol-marker.patt"
            smooth="true" smoothCount="10"
            smoothTolerance="0.01" smoothThreshold="3">

        <a-entity position="0 0.08 0" scale="0.35 0.35 0.35">

            <!-- Orbites -->
            <a-torus rotation="90 0 0" radius="0.45" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="0.65" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="0.85" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.05" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.30" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.5" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.65" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.85" radius-tubular="0.003" color="white"></a-torus>

            <!-- Soleil -->
            <a-entity
                    gltf-model="<?= ASSETS_URL ?>models/sun.glb"
                    position="0 0 0"
                    scale="0.035 0.035 0.035"
                    animation="property: rotation; to: 0 360 0; loop: true; dur: 8000; easing: linear">
            </a-entity>

            <!-- Mercure — orbite 0.45 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 4000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/mercury.glb"
                        position="0.45 0 0"
                        scale="0.01 0.01 0.01">
                </a-entity>
            </a-entity>

            <!-- Vénus — orbite 0.65 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 7000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/venus.glb"
                        position="0.65 0 0"
                        scale="0.5 0.5 0.5">
                </a-entity>
            </a-entity>

            <!-- Terre — orbite 0.85 + rotation propre -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 10000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/earth.glb"
                        position="0.85 0 0"
                        scale="0.012 0.012 0.012"
                        animation="property: rotation; to: 0 360 0; loop: true; dur: 2500; easing: linear">
                </a-entity>
            </a-entity>

            <!-- Mars — orbite 1.05 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 13000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/mars.glb"
                        position="1.05 0 0"
                        scale="0.06 0.06 0.06">
                </a-entity>
            </a-entity>

            <!-- Jupiter — orbite 1.30 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 18000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/jupiter.glb"
                        position="1.30 0 0"
                        scale="0.0002 0.0002 0.0002">
                </a-entity>
            </a-entity>

            <!-- Saturne — orbite 1.55 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 23000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/saturn_planet.glb"
                        position="1.5 0 0"
                        scale="0.1 0.1 0.1">
                </a-entity>
            </a-entity>

            <!-- Uranus — orbite 1.65 (corrigé, distinct de Saturne) -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 28000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/uranus.glb"
                        position="1.65 0 0"
                        scale="0.0008 0.0008 0.0008">
                </a-entity>
            </a-entity>

            <!-- Neptune — orbite 1.75 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 33000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/neptune.glb"
                        position="1.85 0 0"
                        scale="0.008 0.008 0.008">
                </a-entity>
            </a-entity>

        </a-entity>
    </a-marker>

    <a-entity camera></a-entity>
</a-scene>
</body>
</html>