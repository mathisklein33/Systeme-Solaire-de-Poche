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