<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système solaire AR animé</title>

    <script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/AR-js-org/AR.js/aframe/build/aframe-ar.js"></script>

    <script>
        AFRAME.registerComponent('planet-info', {
            schema: {
                name: {type: 'string'},
                info: {type: 'string'}
            },

            init: function () {
                this.el.classList.add('clickable');

                this.el.addEventListener('click', () => {
                    document.getElementById('planetTitle').innerText = this.data.name;
                    document.getElementById('planetText').innerText = this.data.info;
                    document.getElementById('infoBox').style.display = 'block';
                });
            }
        });

        function closeInfo() {
            document.getElementById('infoBox').style.display = 'none';
        }
    </script>
</head>

<body style="margin:0; overflow:hidden;">

<div id="infoBox" style="
    display:none;
    position:fixed;
    left:50%;
    bottom:25px;
    transform:translateX(-50%);
    width:85%;
    max-width:430px;
    background:rgba(0,0,0,0.88);
    color:white;
    padding:15px;
    border-radius:12px;
    font-family:Arial, sans-serif;
    z-index:9999;
    text-align:center;
">
    <button onclick="closeInfo()" style="
        position:absolute;
        top:6px;
        right:10px;
        background:red;
        color:white;
        border:none;
        border-radius:50%;
        width:25px;
        height:25px;
        cursor:pointer;
    ">×</button>

    <h2 id="planetTitle" style="margin:0 0 8px 0;"></h2>
    <p id="planetText" style="margin:0;"></p>
</div>

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
            <a-torus rotation="90 0 0" radius="1.50" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.65" radius-tubular="0.003" color="white"></a-torus>
            <a-torus rotation="90 0 0" radius="1.85" radius-tubular="0.003" color="white"></a-torus>

            <!-- Soleil -->
            <a-entity
                    gltf-model="<?= ASSETS_URL ?>models/sun.glb"
                    position="0 0 0"
                    scale="0.035 0.035 0.035"
                    planet-info="name: Soleil; info: Le Soleil est l’étoile au centre du système solaire. Il fournit lumière et chaleur aux planètes."
                    animation="property: rotation; to: 0 360 0; loop: true; dur: 8000; easing: linear">
            </a-entity>

            <!-- Mercure -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 4000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/mercury.glb"
                        position="0.45 0 0"
                        scale="0.01 0.01 0.01"
                        planet-info="name: Mercure; info: Mercure est la planète la plus proche du Soleil. Elle est petite, rocheuse et très chaude le jour.">
                </a-entity>
            </a-entity>

            <!-- Vénus -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 7000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/venus.glb"
                        position="0.65 0 0"
                        scale="0.5 0.5 0.5"
                        planet-info="name: Vénus; info: Vénus est une planète rocheuse avec une atmosphère très dense. Elle est la planète la plus chaude du système solaire.">
                </a-entity>
            </a-entity>

            <!-- Terre -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 10000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/earth.glb"
                        position="0.85 0 0"
                        scale="0.012 0.012 0.012"
                        planet-info="name: Terre; info: La Terre est notre planète. Elle possède de l’eau liquide, une atmosphère et abrite la vie."
                        animation="property: rotation; to: 0 360 0; loop: true; dur: 2500; easing: linear">
                </a-entity>
            </a-entity>

            <!-- Mars -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 13000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/mars.glb"
                        position="1.05 0 0"
                        scale="0.06 0.06 0.06"
                        planet-info="name: Mars; info: Mars est appelée la planète rouge à cause de sa couleur. Elle possède des montagnes, des volcans et des traces d’ancienne eau.">
                </a-entity>
            </a-entity>

            <!-- Jupiter -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 18000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/jupiter.glb"
                        position="1.30 0 0"
                        scale="0.0002 0.0002 0.0002"
                        planet-info="name: Jupiter; info: Jupiter est la plus grande planète du système solaire. C’est une géante gazeuse connue pour sa Grande Tache rouge.">
                </a-entity>
            </a-entity>

            <!-- Saturne -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 23000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/saturn_planet.glb"
                        position="1.50 0 0"
                        scale="0.1 0.1 0.1"
                        planet-info="name: Saturne; info: Saturne est une géante gazeuse célèbre pour ses grands anneaux composés de glace et de poussière.">
                </a-entity>
            </a-entity>

            <!-- Uranus -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 28000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/uranus.glb"
                        position="1.65 0 0"
                        scale="0.0008 0.0008 0.0008"
                        planet-info="name: Uranus; info: Uranus est une planète géante glacée. Elle a une couleur bleu-vert et tourne presque couchée sur son axe.">
                </a-entity>
            </a-entity>

            <!-- Neptune -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 33000; easing: linear">
                <a-entity
                        gltf-model="<?= ASSETS_URL ?>models/neptune.glb"
                        position="1.85 0 0"
                        scale="0.008 0.008 0.008"
                        planet-info="name: Neptune; info: Neptune est la planète la plus éloignée du Soleil. C’est une géante glacée avec des vents très puissants.">
                </a-entity>
            </a-entity>

        </a-entity>
    </a-marker>

    <a-entity camera>
        <a-cursor
                raycaster="objects: .clickable"
                fuse="false"
                material="color: yellow; shader: flat">
        </a-cursor>
    </a-entity>

</a-scene>

</body>
</html>
