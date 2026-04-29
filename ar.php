<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système solaire AR</title>

    <script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/AR-js-org/AR.js/aframe/build/aframe-ar.js"></script>
</head>

<body style="margin: 0; overflow: hidden;">

<a-scene embedded arjs="sourceType: webcam; debugUIEnabled: false;">

    <a-marker preset="hiro">

        <a-entity position="0 0.15 0" rotation="0 0 0" scale="0.45 0.45 0.45">



            <a-torus position="0 0 0" rotation="90 0 0" radius="0.45" radius-tubular="0.003" color="white"></a-torus>
            <a-torus position="0 0 0" rotation="90 0 0" radius="0.65" radius-tubular="0.003" color="white"></a-torus>
            <a-torus position="0 0 0" rotation="90 0 0" radius="0.85" radius-tubular="0.003" color="white"></a-torus>
            <a-torus position="0 0 0" rotation="90 0 0" radius="1.05" radius-tubular="0.003" color="white"></a-torus>
            <a-torus position="0 0 0" rotation="90 0 0" radius="1.3" radius-tubular="0.003" color="white"></a-torus>
            <a-torus position="0 0 0" rotation="90 0 0" radius="1.55" radius-tubular="0.003" color="white"></a-torus>
            <a-torus position="0 0 0" rotation="90 0 0" radius="1.75" radius-tubular="0.003" color="white"></a-torus>

            <a-sphere position="0 0 0" radius="0.22" color="yellow"></a-sphere>

            <a-sphere position="0.45 0 0" radius="0.04" color="gray"></a-sphere>

            <a-sphere position="0.46 0 0.46" radius="0.06" color="orange"></a-sphere>

            <a-entity
                    gltf-model="https://solarsystem.nasa.gov/rails/active_storage/blobs/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBBaTBSIiwiZXhwIjpudWxsLCJwdXIiOiJibG9iX2lkIn19--7c1183d35fdc9e4b5143c8601376552b89b5d99f/Earth_1_12756.glb"
                    position="0 0 0.85"
                    scale="0.012 0.012 0.012">
            </a-entity>

            <a-sphere position="-0.74 0 0.74" radius="0.05" color="red"></a-sphere>

            <a-sphere position="-1.3 0 0" radius="0.14" color="#c49a6c"></a-sphere>

            <a-sphere position="-1.1 0 -1.1" radius="0.11" color="#d8c28a"></a-sphere>
            <a-torus position="-1.1 0 -1.1" rotation="90 0 0" radius="0.16" radius-tubular="0.008" color="#e6d8a8"></a-torus>

            <a-sphere position="0 0 -1.75" radius="0.09" color="#7fdfff"></a-sphere>

            <a-sphere position="1.24 0 -1.24" radius="0.09" color="blue"></a-sphere>

            <a-sphere position="1.75 0 0" radius="0.035" color="#b8a28a"></a-sphere>

        </a-entity>

    </a-marker>
    <a-entity camera></a-entity>

</a-scene>

</body>
</html>
