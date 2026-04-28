<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réalité augmentée</title>

    <!-- A-Frame -->
    <script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>

    <!-- AR.js -->
    <script src="https://cdn.jsdelivr.net/gh/AR-js-org/AR.js/aframe/build/aframe-ar.js"></script>
</head>

<body style="margin: 0; overflow: hidden;">

<a-scene embedded arjs>
    <a-marker preset="hiro">
        <a-box position="0 0.5 0" color="red"></a-box>
    </a-marker>

    <a-entity camera></a-entity>
</a-scene>

</body>
</html>
