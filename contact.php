<?php include 'includes/header.php'; ?>

<main class="contact-page">

    <!-- Fond décoratif -->
    <div class="contact-bg" aria-hidden="true">
        <div class="contact-bg-glow contact-bg-glow--1"></div>
        <div class="contact-bg-glow contact-bg-glow--2"></div>
        <div class="contact-bg-grid"></div>
    </div>

    <div class="container-xl">
        <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 144px);">
            <div class="col-12 col-md-10 col-lg-7 col-xl-6 py-5">

                <!-- En-tête -->
                <div class="text-center mb-5">
                    <div class="contact-badge mb-3">
                        <span class="badge-dot"></span>
                        Signal actif
                    </div>
                    <h1 class="contact-title">Transmission</h1>
                    <p class="contact-subtitle">Une question, une idée, un projet cosmique ?<br>On t'écoute depuis la Terre.</p>
                </div>

                <!-- Carte formulaire -->
                <div class="contact-card">

                    <form action="https://formspree.io/f/mwvyozzv" method="POST" class="contact-form" id="contactForm">

                        <div class="cf-group">
                            <label class="cf-label" for="name">
                                <span class="cf-label-num">01</span>
                                Identifiant
                            </label>
                            <input
                                    class="cf-input"
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Ex : Explorer-01"
                                    required
                                    autocomplete="name">
                        </div>

                        <div class="cf-group">
                            <label class="cf-label" for="email">
                                <span class="cf-label-num">02</span>
                                Coordonnées
                            </label>
                            <input
                                    class="cf-input"
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="nom@galaxie.com"
                                    required
                                    autocomplete="email">
                        </div>

                        <div class="cf-group">
                            <label class="cf-label" for="message">
                                <span class="cf-label-num">03</span>
                                Message de la mission
                            </label>
                            <textarea
                                    class="cf-input cf-textarea"
                                    id="message"
                                    name="message"
                                    rows="5"
                                    placeholder="Décris ta mission..."></textarea>
                        </div>

                        <button type="submit" class="cf-submit">
                            <span class="cf-submit-icon">◉</span>
                            Envoyer le signal
                        </button>

                    </form>

                    <!-- Infos bas de carte -->
                    <div class="contact-info-row">
                        <div class="contact-info-item">
                            <div class="contact-info-label">Secteur</div>
                            <div class="contact-info-value">Terre (Paris)</div>
                        </div>
                        <div class="contact-info-sep"></div>
                        <div class="contact-info-item">
                            <div class="contact-info-label">Fréquence</div>
                            <div class="contact-info-value">
                                <a href="mailto:hello@ar-vision.com">hello@ar-vision.com</a>
                            </div>
                        </div>
                        <div class="contact-info-sep"></div>
                        <div class="contact-info-item">
                            <div class="contact-info-label">Réponse</div>
                            <div class="contact-info-value">24–48h</div>
                        </div>
                    </div>

                </div>
                <!-- /contact-card -->

            </div>
        </div>
    </div>

</main>


<?php include 'includes/footer.php'; ?>
