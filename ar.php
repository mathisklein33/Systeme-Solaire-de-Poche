<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système solaire AR - Interactif</title>

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
                this.el.addEventListener('click', () => { this.showInfo(); });
                this.el.addEventListener('mousedown', () => { this.showInfo(); });
            },
            showInfo: function() {
                document.getElementById('planetTitle').innerText = this.data.name;
                document.getElementById('planetText').innerText = this.data.info;
                document.getElementById('infoBox').style.display = 'block';
            }
        });

        function closeInfo() {
            document.getElementById('infoBox').style.display = 'none';
        }

        window.addEventListener('load', function () {
            const scene = document.querySelector('a-scene');
            scene.addEventListener('loaded', function () {
                const canvas = scene.canvas;
                canvas.addEventListener('click', function (evt) {
                    const rect = canvas.getBoundingClientRect();
                    const clickX = evt.clientX - rect.left;
                    const clickY = evt.clientY - rect.top;
                    console.log('Clic:', clickX, clickY);

                    // Trouver la vraie caméra
                    let camera = null;
                    document.querySelector('a-scene').object3D.traverse(obj => {
                        if (obj.isCamera) camera = obj;
                    });
                    if (!camera) return;

                    // Mettre à jour les matrices monde
                    document.querySelector('a-scene').object3D.updateMatrixWorld(true);

                    const clickables = Array.from(document.querySelectorAll('.clickable'));
                    let closest = null;
                    let closestDist = Infinity;
                    const HIT_RADIUS_PX = 60; // tolérance en pixels

                    clickables.forEach(el => {
                        const obj = el.object3D;
                        if (!obj) return;

                        // Position monde de la sphère
                        const worldPos = new THREE.Vector3();
                        obj.getWorldPosition(worldPos);

                        // Projeter en coordonnées écran
                        const projected = worldPos.clone().project(camera);
                        const screenX = (projected.x + 1) / 2 * rect.width;
                        const screenY = (-projected.y + 1) / 2 * rect.height;

                        // Ignorer si derrière la caméra
                        if (projected.z > 1) return;

                        const dist = Math.sqrt((clickX - screenX) ** 2 + (clickY - screenY) ** 2);
                        console.log(el.getAttribute('planet-info')?.name, '→ dist px:', Math.round(dist), 'screen:', Math.round(screenX), Math.round(screenY));

                        if (dist < HIT_RADIUS_PX && dist < closestDist) {
                            closestDist = dist;
                            closest = el;
                        }
                    });

                    if (closest) {
                        closest.components['planet-info'].showInfo();
                    }
                });
            });
        });
    </script>
</head>

<body style="margin:0; overflow:hidden;">

<div id="infoBox" style="
    display:none;
    position:fixed;
    left:50%;
    bottom:30px;
    transform:translateX(-50%);
    width:85%;
    max-width:400px;
    background:rgba(0,0,0,0.9);
    color:white;
    padding:20px;
    border-radius:15px;
    font-family: Arial, sans-serif;
    z-index:9999;
    text-align:center;
    box-shadow: 0 10px 20px rgba(0,0,0,0.5);
    border: 1px solid #444;
">
    <button onclick="closeInfo()" style="
        position:absolute;
        top:10px;
        right:10px;
        background:#ff4b2b;
        color:white;
        border:none;
        border-radius:5px;
        padding:5px 10px;
        cursor:pointer;
        font-weight:bold;
    ">X</button>
    <h2 id="planetTitle" style="margin:0 0 10px 0; color:#00ccff;"></h2>
    <p id="planetText" style="margin:0; font-size:14px; line-height:1.5;"></p>
</div>

<a-scene
        embedded
        vr-mode-ui="enabled: false"
        renderer="logarithmicDepthBuffer: true;"
        arjs="sourceType: webcam; debugUIEnabled: false; detectionMode: mono;">

    <a-marker
            type="pattern"
            url="<?= ASSETS_URL ?>markers/pattern-systeme-sol-marker.patt">

        <a-entity position="0 0.1 0" scale="0.4 0.4 0.4">

            <!-- Orbites -->
            <a-entity opacity="0.3">
                <a-torus rotation="90 0 0" radius="0.45" radius-tubular="0.002" color="white"></a-torus>
                <a-torus rotation="90 0 0" radius="0.65" radius-tubular="0.002" color="white"></a-torus>
                <a-torus rotation="90 0 0" radius="0.85" radius-tubular="0.002" color="white"></a-torus>
                <a-torus rotation="90 0 0" radius="1.05" radius-tubular="0.002" color="white"></a-torus>
                <a-torus rotation="90 0 0" radius="1.30" radius-tubular="0.002" color="white"></a-torus>
                <a-torus rotation="90 0 0" radius="1.50" radius-tubular="0.002" color="white"></a-torus>
                <a-torus rotation="90 0 0" radius="1.65" radius-tubular="0.002" color="white"></a-torus>
                <a-torus rotation="90 0 0" radius="1.85" radius-tubular="0.002" color="white"></a-torus>
            </a-entity>

            <!-- Soleil — rayon: 0.25 -->
            <a-entity
                    position="0 0 0"
                    planet-info="name: Soleil; info: Le Soleil est l'étoile au centre du système solaire."
                    geometry="primitive: sphere; radius: 0.25"
                    material="opacity: 0; transparent: true"
                    animation="property: rotation; to: 0 360 0; loop: true; dur: 20000; easing: linear">
                <a-entity gltf-model="<?= ASSETS_URL ?>models/sun.glb" scale="0.04 0.04 0.04"></a-entity>
            </a-entity>

            <!-- Mercure — rayon: 0.12 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 4000; easing: linear">
                <a-entity position="0.45 0 0"
                          planet-info="name: Mercure; info: Mercure est la planète la plus proche du Soleil."
                          geometry="primitive: sphere; radius: 0.12"
                          material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/mercury.glb" scale="0.01 0.01 0.01"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Vénus — rayon: 0.14 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 7000; easing: linear">
                <a-entity position="0.65 0 0"
                          planet-info="name: Vénus; info: Vénus est la planète la plus chaude."
                          geometry="primitive: sphere; radius: 0.14"
                          material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/venus.glb" scale="0.5 0.5 0.5"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Terre — rayon: 0.14 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 10000; easing: linear">
                <a-entity position="0.85 0 0"
                          planet-info="name: Terre; info: La Terre possède de l'eau liquide et abrite la vie."
                          geometry="primitive: sphere; radius: 0.14"
                          material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/earth.glb" scale="0.012 0.012 0.012"
                              animation="property: rotation; to: 0 360 0; loop: true; dur: 3000; easing: linear">
                    </a-entity>
                </a-entity>
            </a-entity>

            <!-- Mars — rayon: 0.12 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 13000; easing: linear">
                <a-entity position="1.05 0 0"
                          planet-info="name: Mars; info: Mars est appelée la planète rouge."
                          geometry="primitive: sphere; radius: 0.12"
                          material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/mars.glb" scale="0.06 0.06 0.06"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Jupiter — rayon: 0.18 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 18000; easing: linear">
                <a-entity position="1.30 0 0"
                          planet-info="name: Jupiter; info: La plus grande planète du système solaire."
                          geometry="primitive: sphere; radius: 0.18"
                          material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/jupiter.glb" scale="0.0002 0.0002 0.0002"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Saturne — rayon: 0.18 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 23000; easing: linear">
                <a-entity position="1.50 0 0"
                          planet-info="name: Saturne; info: Célèbre pour ses anneaux de glace."
                          geometry="primitive: sphere; radius: 0.18"
                          material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/saturn_planet.glb" scale="0.1 0.1 0.1"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Uranus — rayon: 0.15 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 28000; easing: linear">
                <a-entity position="1.65 0 0"
                          planet-info="name: Uranus; info: Une géante glacée à la rotation inclinée."
                          geometry="primitive: sphere; radius: 0.15"
                          material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/uranus.glb" scale="0.0008 0.0008 0.0008"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Neptune — rayon: 0.15 -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 33000; easing: linear">
                <a-entity position="1.85 0 0"
                          planet-info="name: Neptune; info: La planète la plus éloignée du Soleil."
                          geometry="primitive: sphere; radius: 0.15"
                          material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/neptune.glb" scale="0.008 0.008 0.008"></a-entity>
                </a-entity>
            </a-entity>

        </a-entity>
    </a-marker>

    <a-entity camera></a-entity>

</a-scene>

</body>
</html>