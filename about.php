<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réalité Augmentée - Espace</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap');

        body {
            margin: 0;
            background-color: #050714;
            /* Gradient plus profond pour un effet de nébuleuse */
            background-image:
                    radial-gradient(circle at 20% 30%, rgba(74, 144, 226, 0.15) 0%, transparent 40%),
                    radial-gradient(circle at 80% 70%, rgba(162, 89, 255, 0.1) 0%, transparent 40%),
                    radial-gradient(circle at 50% 50%, #0d122b 0%, #050714 100%);
            background-attachment: fixed;
            color: white;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
            overflow-x: hidden;
        }

        .container {
            max-width: 600px;
            text-align: center;
            position: relative;
        }

        /* Animation de flottement pour les images */
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(2deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        h1 {
            font-weight: 600;
            font-size: 2.2rem;
            margin-bottom: 60px;
            margin-top: 20px;
            letter-spacing: -0.5px;
            background: linear-gradient(to bottom, #ffffff, #a2a2a2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        /* Boîtes de texte style AR (Glassmorphism) */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 10px 30px;
            margin: 20px 0;
            transition: transform 0.3s ease, border 0.3s ease;
        }

        .glass-card:hover {
            transform: scale(1.02);
            border-color: rgba(74, 144, 226, 0.3);
        }

        p {
            line-height: 1.8;
            font-size: 1.15rem;
            color: #d1d1d1;
        }

        .divider {
            width: 100%;
            margin: 40px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .divider img {
            max-width: 120px;
            height: auto;
            filter: drop-shadow(0 0 15px rgba(74, 144, 226, 0.4));
            animation: float 6s ease-in-out infinite;
        }

        /* Décoration supplémentaire : petites étoiles fixes */
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.3;
        }

    </style>
</head>
<body>

<div class="container">
    <!-- Étoiles décoratives en arrière-plan -->
    <div class="star" style="width: 2px; height: 2px; top: 10%; left: -20%;"></div>
    <div class="star" style="width: 1px; height: 1px; top: 40%; right: -15%;"></div>
    <div class="star" style="width: 3px; height: 3px; bottom: 20%; left: -10%;"></div>

    <div class="divider">
        <img src="assets/images/saturn.png" alt="saturne">
    </div>

    <h1>Qu’est-ce que la réalité augmentée ?</h1>

    <div class="glass-card">
        <p>La <strong>réalité augmentée (AR)</strong> est une technologie qui permet d’ajouter des éléments virtuels (images, objets 3D, textes, animations) au monde réel grâce à un smartphone, une tablette ou un ordinateur.</p>
    </div>

    <div class="divider">
        <img src="assets/images/asteroid.png" alt="asteroides" style="max-width: 60px; animation-delay: 1s;">
        <span style="color: #4a90e2; font-size: 1.5rem; text-shadow: 0 0 10px #4a90e2;">✦</span>
        <img src="assets/images/planet.png" alt="planète" style="max-width: 80px; animation-delay: 2s;">
    </div>

    <div class="glass-card">
        <p>Contrairement à la réalité virtuelle, qui plonge l’utilisateur dans un monde entièrement numérique, la réalité augmentée <strong>enrichit</strong> ce que l’on voit dans la réalité en y superposant des informations interactives.</p>
    </div>

    <div class="divider">
        <img src="assets/images/neptune.png" alt="neptune" style="animation-delay: 3s;">
    </div>

    <div class="glass-card">
        <p>Par exemple, en pointant la caméra de ton téléphone vers une image ou un objet, tu peux voir apparaître un <strong>modèle 3D</strong>, comme une planète, directement dans ton environnement.</p>
    </div>
</div>

</body>
</html>