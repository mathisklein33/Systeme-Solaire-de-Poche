<?php include 'includes/header.php'; ?>

<!-- ===================== HERO ===================== -->
<section class="hero overflow-hidden position-relative">
    <div class="hero-bg-stars"></div>

    <div class="container-xl">
        <div class="row align-items-center g-5" style="min-height: 100vh;">

            <!-- Texte -->
            <div class="col-12 col-lg-6 text-center text-lg-start order-2 order-lg-1 py-5 py-lg-0">

                <div class="hero-badge d-inline-flex align-items-center gap-2 mb-4">
                    <span class="badge-dot"></span>
                    Nouvelle expérience immersive disponible
                </div>

                <h1 class="hero-title mb-3">
                    Explore le<br>
                    <span class="gradient-text">Système Solaire</span><br>
                    dans ta main
                </h1>

                <p class="hero-subtitle mb-4">
                    Plonge dans l'univers avec une expérience de réalité augmentée unique.
                    Découvre les planètes, leurs orbites et leurs secrets depuis ton téléphone.
                </p>

                <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start mb-5">
                    <a href="ar.php" class="btn-primary-custom">
                        <span class="btn-icon">◉</span>
                        Lancer la RA
                    </a>
                    <a href="#decouvrir" class="btn-ghost-custom">En savoir plus →</a>
                </div>

                <div class="d-flex justify-content-center justify-content-lg-start gap-4">
                    <div class="stat-item text-center text-lg-start">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Planètes</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item text-center text-lg-start">
                        <div class="stat-number">200+</div>
                        <div class="stat-label">Lunes</div>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item text-center text-lg-start">
                        <div class="stat-number">4,6G</div>
                        <div class="stat-label">Années d'histoire</div>
                    </div>
                </div>
            </div>

            <!-- Visuel -->
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <div class="hero-visual d-flex align-items-center justify-content-center position-relative">
                    <div class="orbit-ring orbit-1"></div>
                    <div class="orbit-ring orbit-2 d-none d-md-block"></div>
                    <div class="orbit-ring orbit-3 d-none d-lg-block"></div>
                    <img
                            src="assets/images/Systeme-Solaire-de-Poche-main.png"
                            class="hero-img img-fluid position-relative"
                            alt="Planètes du système solaire">
                    <div class="glow-orb"></div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===================== FEATURE STRIP ===================== -->
<div class="feature-strip py-3">
    <div class="container-xl">
        <div class="d-flex flex-wrap align-items-center justify-content-center gap-3">
            <div class="strip-item"><span class="strip-icon">✦</span> Réalité augmentée WebXR</div>
            <span class="strip-sep d-none d-sm-inline">·</span>
            <div class="strip-item"><span class="strip-icon">✦</span> Gyroscope & capteurs</div>
            <span class="strip-sep d-none d-sm-inline">·</span>
            <div class="strip-item"><span class="strip-icon">✦</span> Données astronomiques réelles</div>
            <span class="strip-sep d-none d-sm-inline">·</span>
            <div class="strip-item"><span class="strip-icon">✦</span> 100% dans le navigateur</div>
        </div>
    </div>
</div>

<!-- ===================== COMMENT ÇA MARCHE ===================== -->
<section class="py-5 py-lg-6" id="decouvrir">
    <div class="container-xl">

        <div class="row mb-5">
            <div class="col-12 col-md-8">
                <div class="section-label">Comment ça marche</div>
                <h2 class="section-title">Trois étapes vers l'univers</h2>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="step-card h-100">
                    <div class="step-num">01</div>
                    <div class="step-icon-wrap mb-3"><div class="step-icon">📱</div></div>
                    <h3>Ouvre sur mobile</h3>
                    <p>Accède à l'expérience directement depuis ton navigateur, sans installation requise.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="step-card h-100">
                    <div class="step-num">02</div>
                    <div class="step-icon-wrap mb-3"><div class="step-icon">🌍</div></div>
                    <h3>Active la RA</h3>
                    <p>Autorise l'accès à la caméra et aux capteurs. Le système solaire se matérialise devant toi.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="step-card h-100">
                    <div class="step-num">03</div>
                    <div class="step-icon-wrap mb-3"><div class="step-icon">🔭</div></div>
                    <h3>Explore & découvre</h3>
                    <p>Tourne autour des planètes, lis leurs fiches et observe leurs orbites en temps réel.</p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ===================== PLANÈTES ===================== -->
<section class="section-dark py-5 py-lg-6">
    <div class="container-xl">

        <div class="row mb-5">
            <div class="col-12 col-md-8">
                <div class="section-label">Ce que tu vas découvrir</div>
                <h2 class="section-title">Les planètes t'attendent</h2>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="planet-card">
                    <div class="planet-emoji">☀️</div>
                    <div class="planet-info">
                        <h4>Soleil</h4><p>Notre étoile — 1 392 000 km de diamètre</p>
                    </div>
                    <span class="planet-tag ms-auto">Étoile</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="planet-card">
                    <div class="planet-emoji">⚫</div>
                    <div class="planet-info">
                        <h4>Mercure</h4><p>La plus proche du soleil, sans atmosphère</p>
                    </div>
                    <span class="planet-tag ms-auto">Rocheuse</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="planet-card">
                    <div class="planet-emoji">🟡</div>
                    <div class="planet-info">
                        <h4>Vénus</h4><p>La plus chaude, 462°C en surface</p>
                    </div>
                    <span class="planet-tag ms-auto">Rocheuse</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="planet-card">
                    <div class="planet-emoji">🔵</div>
                    <div class="planet-info">
                        <h4>Terre</h4><p>Notre maison, la seule avec de la vie connue</p>
                    </div>
                    <span class="planet-tag ms-auto">Rocheuse</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="planet-card">
                    <div class="planet-emoji">🔴</div>
                    <div class="planet-info">
                        <h4>Mars</h4><p>La planète rouge, future destination humaine</p>
                    </div>
                    <span class="planet-tag ms-auto">Rocheuse</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="planet-card">
                    <div class="planet-emoji">🟠</div>
                    <div class="planet-info">
                        <h4>Jupiter</h4><p>La plus grande, 11 fois la Terre</p>
                    </div>
                    <span class="planet-tag ms-auto">Géante gazeuse</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="planet-card">
                    <div class="planet-emoji">💛</div>
                    <div class="planet-info">
                        <h4>Saturne</h4><p>Ses anneaux de glace, visibles en RA</p>
                    </div>
                    <span class="planet-tag ms-auto">Géante gazeuse</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="planet-card">
                    <div class="planet-emoji">🩵</div>
                    <div class="planet-info">
                        <h4>Uranus</h4><p>Tourne sur le côté, axe à 98°</p>
                    </div>
                    <span class="planet-tag ms-auto">Géante de glace</span>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="planet-card">
                    <div class="planet-emoji">🔵</div>
                    <div class="planet-info">
                        <h4>Neptune</h4><p>Vents à 2 100 km/h, la plus lointaine</p>
                    </div>
                    <span class="planet-tag ms-auto">Géante de glace</span>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="py-5 py-lg-6 cta-section">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-7">
                <div class="cta-card text-center position-relative">
                    <div class="cta-glow"></div>
                    <div class="position-relative" style="z-index:2;">
                        <div class="section-label">Prêt·e à explorer ?</div>
                        <h2 class="cta-title mb-3">Le cosmos n'attend que toi</h2>
                        <p class="cta-text mb-4">
                            Expérience 100% gratuite, directement dans ton navigateur.<br class="d-none d-md-inline">
                            Compatible Chrome, Firefox, Safari mobile.
                        </p>
                        <a href="ar.php" class="btn-primary-custom btn-large-custom">
                            <span class="btn-icon">◉</span>
                            Démarrer l'exploration
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
