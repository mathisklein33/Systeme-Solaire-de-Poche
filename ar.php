<?php require_once 'config/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système solaire AR - Interactif</title>

    <script src="https://aframe.io/releases/1.4.0/aframe.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/AR-js-org/AR.js/aframe/build/aframe-ar.js"></script>

    <style>
        #infoBox {
            display: none;
            position: fixed;
            left: 50%;
            bottom: 20px;
            transform: translateX(-50%);
            width: 90%;
            max-width: 420px;
            font-family: 'Arial', sans-serif;
            z-index: 9999;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0,0,0,0.7);
            border: 3px solid #e63946;
        }

        /* Bande rouge du haut */
        #pokedex-header {
            background: #e63946;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
        }
        #pokedex-header .led-big {
            width: 28px; height: 28px;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 35%, #fff 10%, #7ecfff 60%, #1a8fd1);
            border: 3px solid white;
            box-shadow: 0 0 8px #7ecfff;
            flex-shrink: 0;
        }
        #pokedex-header .leds-small {
            display: flex; gap: 5px;
        }
        #pokedex-header .led-small {
            width: 10px; height: 10px; border-radius: 50%;
        }
        #pokedex-header h2 {
            color: white;
            margin: 0 0 0 auto;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.4);
        }
        #close-btn {
            position: absolute;
            top: 8px; right: 10px;
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            font-weight: bold;
            line-height: 1;
        }

        /* Corps noir */
        #pokedex-body {
            background: #1a1a2e;
            padding: 16px;
        }

        /* Ligne de séparation rouge */
        .dex-divider {
            height: 3px;
            background: linear-gradient(to right, #e63946, transparent);
            margin: 10px 0;
            border-radius: 2px;
        }

        /* Stats */
        .dex-stats {
            display: flex;
            gap: 8px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }
        .dex-stat {
            background: #16213e;
            border: 1px solid #e63946;
            border-radius: 8px;
            padding: 6px 10px;
            flex: 1;
            min-width: 80px;
            text-align: center;
        }
        .dex-stat-label {
            font-size: 9px;
            color: #aaa;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
        }
        .dex-stat-value {
            font-size: 13px;
            color: #00d4ff;
            font-weight: bold;
            display: block;
            margin-top: 2px;
        }

        /* Type badge */
        .dex-type {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-right: 6px;
            margin-bottom: 8px;
        }

        /* Description */
        #planetText {
            color: #ccc;
            font-size: 13px;
            line-height: 1.7;
            margin: 0;
            font-style: italic;
        }

        /* Numéro */
        #planet-number {
            color: #444;
            font-size: 11px;
            text-align: right;
            margin-top: 10px;
            font-family: monospace;
        }
    </style>

    <script>
        const PLANETS = {
            'Soleil': {
                number: '☀️ ÉTOILE',
                taille: '1 392 700 km',
                surface: 'Gazeuse',
                type: 'Étoile',
                typeColor: '#f4a261',
                info: 'Le Soleil est l\'étoile au centre de notre système solaire. Sa masse représente 99,8% de la masse totale du système. Sa surface, la photosphère, atteint 5 500°C.'
            },
            'Mercure': {
                number: '#01',
                taille: '4 879 km',
                surface: 'Rocheuse',
                type: 'Tellurique',
                typeColor: '#888',
                info: 'Mercure est la planète la plus proche du Soleil et la plus petite du système solaire. Sans atmosphère pour retenir la chaleur, les températures varient de -180°C à 430°C.'
            },
            'Vénus': {
                number: '#02',
                taille: '12 104 km',
                surface: 'Volcanique',
                type: 'Tellurique',
                typeColor: '#e9c46a',
                info: 'Vénus est la planète la plus chaude avec 465°C en moyenne, à cause de son atmosphère de CO₂ très dense. Elle tourne dans le sens inverse des autres planètes.'
            },
            'Terre': {
                number: '#03',
                taille: '12 742 km',
                surface: 'Océans & Continents',
                type: 'Habitable',
                typeColor: '#2a9d8f',
                info: 'La Terre est la seule planète connue abritant la vie. Elle possède de l\'eau liquide en surface, une atmosphère protectrice et un champ magnétique qui la protège des vents solaires.'
            },
            'Mars': {
                number: '#04',
                taille: '6 779 km',
                surface: 'Désertique',
                type: 'Tellurique',
                typeColor: '#e63946',
                info: 'Mars est appelée la planète rouge en raison de l\'oxyde de fer sur sa surface. Elle abrite Olympus Mons, le plus grand volcan du système solaire (21 km de haut).'
            },
            'Jupiter': {
                number: '#05',
                taille: '139 820 km',
                surface: 'Gazeuse',
                type: 'Géante gazeuse',
                typeColor: '#f4a261',
                info: 'Jupiter est la plus grande planète du système solaire. Sa Grande Tache Rouge est une tempête qui dure depuis plus de 350 ans. Elle possède 95 lunes connues.'
            },
            'Saturne': {
                number: '#06',
                taille: '116 460 km',
                surface: 'Gazeuse',
                type: 'Géante gazeuse',
                typeColor: '#e9c46a',
                info: 'Saturne est célèbre pour ses magnifiques anneaux composés de glace et de rochers. C\'est la planète la moins dense du système solaire — elle flotterait sur l\'eau !'
            },
            'Uranus': {
                number: '#07',
                taille: '50 724 km',
                surface: 'Glacée',
                type: 'Géante glacée',
                typeColor: '#00d4ff',
                info: 'Uranus est une géante glacée dont l\'axe de rotation est incliné à 98°, ce qui lui donne une rotation presque couchée. Sa température atteint -224°C, la plus froide du système.'
            },
            'Neptune': {
                number: '#08',
                taille: '49 244 km',
                surface: 'Glacée',
                type: 'Géante glacée',
                typeColor: '#4361ee',
                info: 'Neptune est la planète la plus éloignée du Soleil. Ses vents sont les plus rapides du système solaire, atteignant 2 100 km/h. Une année neptunienne dure 165 ans terrestres.'
            }
        };

        AFRAME.registerComponent('planet-info', {
            schema: { name: {type: 'string'} },
            init: function () {
                this.el.classList.add('clickable');
            },
            showInfo: function() {
                const data = PLANETS[this.data.name];
                if (!data) return;

                document.getElementById('planetTitle').innerText = this.data.name;
                document.getElementById('planet-number').innerText = data.number;
                document.getElementById('stat-taille').innerText = data.taille;
                document.getElementById('stat-surface').innerText = data.surface;

                const typeEl = document.getElementById('planet-type');
                typeEl.innerText = data.type;
                typeEl.style.background = data.typeColor;
                typeEl.style.color = '#fff';

                document.getElementById('planetText').innerText = data.info;
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

                    let camera = null;
                    scene.object3D.traverse(obj => { if (obj.isCamera) camera = obj; });
                    if (!camera) return;

                    scene.object3D.updateMatrixWorld(true);

                    const clickables = Array.from(document.querySelectorAll('.clickable'));
                    let closest = null;
                    let closestDist = Infinity;
                    const HIT_RADIUS_PX = 60;

                    clickables.forEach(el => {
                        const obj = el.object3D;
                        if (!obj) return;
                        const worldPos = new THREE.Vector3();
                        obj.getWorldPosition(worldPos);
                        const projected = worldPos.clone().project(camera);
                        const screenX = (projected.x + 1) / 2 * rect.width;
                        const screenY = (-projected.y + 1) / 2 * rect.height;
                        if (projected.z > 1) return;
                        const dist = Math.sqrt((clickX - screenX) ** 2 + (clickY - screenY) ** 2);
                        if (dist < HIT_RADIUS_PX && dist < closestDist) {
                            closestDist = dist;
                            closest = el;
                        }
                    });

                    if (closest) closest.components['planet-info'].showInfo();
                });
            });
        });
    </script>
</head>

<body style="margin:0; overflow:hidden;">

<div id="infoBox">
    <div id="pokedex-header">
        <div class="led-big"></div>
        <div class="leds-small">
            <div class="led-small" style="background:#ff6b6b;"></div>
            <div class="led-small" style="background:#ffd93d;"></div>
            <div class="led-small" style="background:#6bcb77;"></div>
        </div>
        <h2 id="planetTitle"></h2>
        <button id="close-btn" onclick="closeInfo()">✕</button>
    </div>

    <div id="pokedex-body">
        <div class="dex-stats">
            <div class="dex-stat">
                <span class="dex-stat-label">Diamètre</span>
                <span class="dex-stat-value" id="stat-taille">—</span>
            </div>
            <div class="dex-stat">
                <span class="dex-stat-label">Surface</span>
                <span class="dex-stat-value" id="stat-surface">—</span>
            </div>
        </div>

        <span class="dex-type" id="planet-type"></span>

        <div class="dex-divider"></div>

        <p id="planetText"></p>

        <p id="planet-number"></p>
    </div>
</div>

<a-scene
        embedded
        vr-mode-ui="enabled: false"
        renderer="logarithmicDepthBuffer: true;"
        arjs="sourceType: webcam; debugUIEnabled: false; detectionMode: mono;">

    <a-marker type="pattern" url="<?= ASSETS_URL ?>markers/pattern-systeme-sol-marker.patt">

        <a-entity position="0 0.1 0" scale="0.4 0.4 0.4">

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

            <!-- Soleil -->
            <a-entity position="0 0 0"
                      planet-info="name: Soleil"
                      geometry="primitive: sphere; radius: 0.25"
                      material="opacity: 0; transparent: true"
                      animation="property: rotation; to: 0 360 0; loop: true; dur: 20000; easing: linear">
                <a-entity gltf-model="<?= ASSETS_URL ?>models/sun.glb" scale="0.04 0.04 0.04"></a-entity>
            </a-entity>

            <!-- Mercure -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 4000; easing: linear">
                <a-entity position="0.45 0 0" planet-info="name: Mercure"
                          geometry="primitive: sphere; radius: 0.12" material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/mercury.glb" scale="0.01 0.01 0.01"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Vénus -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 7000; easing: linear">
                <a-entity position="0.65 0 0" planet-info="name: Vénus"
                          geometry="primitive: sphere; radius: 0.14" material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/venus.glb" scale="0.5 0.5 0.5"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Terre -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 10000; easing: linear">
                <a-entity position="0.85 0 0" planet-info="name: Terre"
                          geometry="primitive: sphere; radius: 0.14" material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/earth.glb" scale="0.012 0.012 0.012"
                              animation="property: rotation; to: 0 360 0; loop: true; dur: 3000; easing: linear">
                    </a-entity>
                </a-entity>
            </a-entity>

            <!-- Mars -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 13000; easing: linear">
                <a-entity position="1.05 0 0" planet-info="name: Mars"
                          geometry="primitive: sphere; radius: 0.12" material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/mars.glb" scale="0.06 0.06 0.06"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Jupiter -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 18000; easing: linear">
                <a-entity position="1.30 0 0" planet-info="name: Jupiter"
                          geometry="primitive: sphere; radius: 0.18" material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/jupiter.glb" scale="0.0002 0.0002 0.0002"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Saturne -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 23000; easing: linear">
                <a-entity position="1.50 0 0" planet-info="name: Saturne"
                          geometry="primitive: sphere; radius: 0.18" material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/saturn_planet.glb" scale="0.1 0.1 0.1"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Uranus -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 28000; easing: linear">
                <a-entity position="1.65 0 0" planet-info="name: Uranus"
                          geometry="primitive: sphere; radius: 0.15" material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/uranus.glb" scale="0.0008 0.0008 0.0008"></a-entity>
                </a-entity>
            </a-entity>

            <!-- Neptune -->
            <a-entity animation="property: rotation; to: 0 360 0; loop: true; dur: 33000; easing: linear">
                <a-entity position="1.85 0 0" planet-info="name: Neptune"
                          geometry="primitive: sphere; radius: 0.15" material="opacity: 0; transparent: true">
                    <a-entity gltf-model="<?= ASSETS_URL ?>models/neptune.glb" scale="0.008 0.008 0.008"></a-entity>
                </a-entity>
            </a-entity>

        </a-entity>
    </a-marker>

    <a-entity camera></a-entity>

</a-scene>

</body>
</html>