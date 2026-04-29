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

        <a-sphere
                position="0 0.4 0"
                radius="0.25"
                color="yellow">
        </a-sphere>

        <a-sphere
                position="0.45 0.25 0"
                radius="0.05"
                color="gray">
        </a-sphere>

        <a-sphere
                position="0.65 0.25 0"
                radius="0.08"
                color="orange">
        </a-sphere>

        <a-entity
                gltf-model="https://solarsystem.nasa.gov/rails/active_storage/blobs/redirect/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBBaTBSIiwiZXhwIjpudWxsLCJwdXIiOiJibG9iX2lkIn19--7c1183d35fdc9e4b5143c8601376552b89b5d99f/Earth_1_12756.glb"
                position="0.9 0.25 0"
                scale="0.015 0.015 0.015">
        </a-entity>

        <a-sphere
                position="1.15 0.25 0"
                radius="0.07"
                color="red">
        </a-sphere>

        <a-sphere
                position="1.5 0.3 0"
                radius="0.17"
                color="#c49a6c">
        </a-sphere>

        <a-sphere
                position="1.9 0.3 0"
                radius="0.14"
                color="#d8c28a">
        </a-sphere>

        <a-torus
                position="1.9 0.3 0"
                rotation="90 0 0"
                radius="0.2"
                radius-tubular="0.01"
                color="#e6d8a8">
        </a-torus>

        <a-sphere
                position="2.25 0.25 0"
                radius="0.11"
                color="#7fdfff">
        </a-sphere>

        <a-sphere
                position="2.55 0.25 0"
                radius="0.11"
                color="blue">
        </a-sphere>

        <a-sphere
                position="2.85 0.25 0"
                radius="0.04"
                color="#b8a28a">
        </a-sphere>

    </a-marker>

    <a-entity camera></a-entity>

</a-scene>

</body>
</html>
