<?php include 'includes/header.php'; ?>

<main class="ar-page">

    <!-- Fond décoratif -->
    <div class="ar-bg" aria-hidden="true">
        <div class="ar-bg-glow ar-bg-glow--1"></div>
        <div class="ar-bg-glow ar-bg-glow--2"></div>
        <div class="ar-bg-grid"></div>
    </div>

    <div class="container-xl" style="position:relative; z-index:2;">

        <!-- ===== HERO ===== -->
        <div class="row justify-content-center text-center pt-5 pb-4">
            <div class="col-12 col-md-9 col-lg-7">
                <div class="ar-badge mb-4">
                    <span class="badge-dot"></span>
                    Technologie
                </div>
                <h1 class="ar-title mb-3">Réalité<br><span class="gradient-text">Augmentée</span></h1>
                <p class="ar-subtitle">Découvre comment une technologie invisible transforme ta façon de voir le monde — et les planètes.</p>
            </div>
        </div>

        <!-- Planète décorative centrale -->
        <div class="ar-hero-visual my-4">
            <div class="ar-orbit-ring ar-orbit-1"></div>
            <div class="ar-orbit-ring ar-orbit-2 d-none d-md-block"></div>
            <img src="assets/images/saturn.png" alt="Saturne" class="ar-planet-img img-fluid">
            <div class="ar-planet-glow"></div>
        </div>

        <!-- ===== CARDS ===== -->
        <div class="row justify-content-center pb-5">
            <div class="col-12 col-lg-10">

                <!-- Card 1 -->
                <div class="ar-card mb-4">
                    <div class="row align-items-center g-4">
                        <div class="col-12 col-md-2 text-center">
                            <div class="ar-card-num">01</div>
                        </div>
                        <div class="col-12 col-md-10">
                            <div class="ar-card-label mb-2">Définition</div>
                            <h2 class="ar-card-title mb-2">Qu'est-ce que la réalité augmentée ?</h2>
                            <p class="ar-card-text">La <strong>réalité augmentée (AR)</strong> est une technologie qui permet d'ajouter des éléments virtuels — images, objets 3D, textes, animations — au monde réel grâce à un smartphone, une tablette ou un ordinateur.</p>
                        </div>
                    </div>
                </div>

                <!-- Petite planète séparatrice -->
                <div class="ar-sep text-center my-2">
                    <img src="assets/images/asteroid.png" alt="" class="ar-sep-img" aria-hidden="true">
                    <span class="ar-sep-star">✦</span>
                    <img src="assets/images/planet.png" alt="" class="ar-sep-img ar-sep-img--lg" aria-hidden="true">
                </div>

                <!-- Card 2 -->
                <div class="ar-card mb-4">
                    <div class="row align-items-center g-4">
                        <div class="col-12 col-md-2 text-center">
                            <div class="ar-card-num">02</div>
                        </div>
                        <div class="col-12 col-md-10">
                            <div class="ar-card-label mb-2">AR vs VR</div>
                            <h2 class="ar-card-title mb-2">Enrichir le réel, pas le remplacer</h2>
                            <p class="ar-card-text">Contrairement à la <strong>réalité virtuelle</strong>, qui plonge l'utilisateur dans un monde entièrement numérique, la réalité augmentée <strong>enrichit</strong> ce que l'on voit en y superposant des informations interactives — sans couper du monde réel.</p>
                        </div>
                    </div>
                </div>

                <!-- Petite planète séparatrice -->
                <div class="ar-sep text-center my-2">
                    <img src="assets/images/neptune.png" alt="" class="ar-sep-img ar-sep-img--lg" aria-hidden="true">
                </div>

                <!-- Card 3 -->
                <div class="ar-card mb-5">
                    <div class="row align-items-center g-4">
                        <div class="col-12 col-md-2 text-center">
                            <div class="ar-card-num">03</div>
                        </div>
                        <div class="col-12 col-md-10">
                            <div class="ar-card-label mb-2">En pratique</div>
                            <h2 class="ar-card-title mb-2">Un modèle 3D dans ta main</h2>
                            <p class="ar-card-text">Pointe la caméra de ton téléphone vers une image ou un objet, et vois apparaître un <strong>modèle 3D</strong> directement dans ton environnement — une planète qui tourne, ses anneaux, ses lunes, à portée de main.</p>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="text-center pb-5">
                    <a href="ar.php" class="btn-primary-custom btn-large-custom">
                        <span class="btn-icon">◉</span>
                        Essayer la RA maintenant
                    </a>
                </div>

            </div>
        </div>

    </div>
</main>


<?php include 'includes/footer.php'; ?>
c