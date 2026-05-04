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
            smooth="true"
            smoothCount="10"
            smoothTolerance="0.01"
            smoothThreshold="3">

        <a-entity position="0 0.08 0" scale="0.35 0.35 0.35">

            <!-- Orbites -->
            <a-torus rotation="90 0 0" radius="0.45" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="0.65" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="0.85" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.05" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.30" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.55" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.75" radius-tubular="0.003" color="white"></a-torus>

            <!-- Soleil animé -->
            <a-sphere
                    position="0 0 0"
                    radius="0.22"
                    color="yellow"
                    animation="property: rotation; to: 0 360 0; loop: true; dur: 8000; easing: linear">
            </a-sphere>

            <!-- Mercure -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 4000; easing: linear">
                <a-sphere position="0.45 0 0" radius="0.04" color="gray"></a-sphere>
            </a-entity>

            <!-- Vénus -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 7000; easing: linear">
                <a-sphere position="0.65 0 0" radius="0.06" color="orange"></a-sphere>
            </a-entity>

            <!-- Terre -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 10000; easing: linear">
                <a-entity
                        gltf-model="#"
                        position="0.85 0 0"
                        scale="0.012 0.012 0.012"
                        animation="property: rotation; to: 0 360 0; loop: true; dur: 2500; easing: linear">
                </a-entity>
            </a-entity>

            <!-- Mars -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 13000; easing: linear">
                <a-sphere position="1.05 0 0" radius="0.05" color="red"></a-sphere>
            </a-entity>

            <!-- Jupiter -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 18000; easing: linear">
                <a-sphere position="1.30 0 0" radius="0.14" color="#c49a6c"></a-sphere>
            </a-entity>

            <!-- Saturne -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 23000; easing: linear">
                <a-entity position="1.55 0 0">
                    <a-sphere radius="0.11" color="#d8c28a"></a-sphere>
                    <a-torus rotation="90 0 0" radius="0.16" radius-tubular="0.008" color="#e6d8a8"></a-torus>
                </a-entity>
            </a-entity>

            <!-- Uranus -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 28000; easing: linear">
                <a-sphere position="1.55 0 0" radius="0.09" color="#7fdfff"></a-sphere>
            </a-entity>

            <!-- Neptune -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 33000; easing: linear">
                <a-sphere position="1.75 0 0" radius="0.09" color="blue"></a-sphere>
            </a-entity>

        </a-entity>

    </a-marker>

    <a-entity camera></a-entity>

</a-scene>

</body>
</html>
