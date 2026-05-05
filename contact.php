<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Expérience AR</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Rajdhani:wght@300;500;600&display=swap');

        :root {
            --neon-blue: #00f2fe;
            --deep-space: #050714;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--deep-space);
            background-image:
                    radial-gradient(circle at 10% 10%, rgba(0, 242, 254, 0.05) 0%, transparent 30%),
                    radial-gradient(circle at 90% 90%, rgba(162, 89, 255, 0.05) 0%, transparent 30%),
                    radial-gradient(circle at 50% 50%, #0d122b 0%, #050714 100%);
            color: white;
            font-family: 'Rajdhani', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .contact-container {
            width: 100%;
            max-width: 600px;
            padding: 40px;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            letter-spacing: 3px;
            margin-bottom: 10px;
            text-transform: uppercase;
            color: var(--neon-blue);
        }

        p.subtitle {
            font-weight: 300;
            color: #a2a2a2;
            margin-bottom: 30px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--neon-blue);
        }

        input, textarea {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            color: white;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1rem;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--neon-blue);
            background: rgba(0, 242, 254, 0.05);
            box-shadow: 0 0 10px rgba(0, 242, 254, 0.2);
        }

        button {
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            background: transparent;
            border: 1px solid var(--neon-blue);
            color: var(--neon-blue);
            font-family: 'Orbitron', sans-serif;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        button:hover {
            background: var(--neon-blue);
            color: var(--deep-space);
            box-shadow: 0 0 20px var(--neon-blue);
        }

        .contact-info {
            margin-top: 30px;
            display: flex;
            justify-content: space-around;
            font-size: 0.9rem;
            border-top: 1px solid var(--glass-border);
            padding-top: 20px;
            color: #a2a2a2;
        }

        .info-item span {
            display: block;
            color: white;
            font-weight: 600;
        }

    </style>
</head>
<body>

<div class="contact-container">
    <h1>Transmission</h1>
    <p class="subtitle">Prêt à explorer de nouvelles dimensions ?</p>

    <!-- Remplace TON_ID par l'identifiant donné par Formspree -->
    <form action="https://formspree.io/f/mwvyozzv" method="POST">
        <div class="form-group">
            <label for="name">Identifiant (Nom)</label>
            <!-- AJOUT : l'attribut name="name" est obligatoire pour recevoir la donnée -->
            <input type="text" id="name" name="name" placeholder="Ex: Explorer-01" required>
        </div>

        <div class="form-group">
            <label for="email">Coordonnées (Email)</label>
            <input type="email" id="email" name="email" placeholder="nom@galaxie.com" required>
        </div>

        <div class="form-group">
            <label for="message">Message de la mission</label>
            <textarea id="message" name="message" rows="4" placeholder="Dites-nous tout..."></textarea>
        </div>

        <button type="submit">Envoyer le signal</button>
    </form>

    <div class="contact-info">
        <div class="info-item">
            <span>Secteur</span>
            Terre (Paris)
        </div>
        <div class="info-item">
            <span>Fréquence</span>
            hello@ar-vision.com
        </div>
    </div>
</div>

</body>
</html>