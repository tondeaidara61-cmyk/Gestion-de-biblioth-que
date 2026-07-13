<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Gestion de Bibliothèque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/accueil.css?v=<?= time() ?>">
</head>
<body>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-text fade-up delay-1">
            <span class="ruban">Système de gestion</span>
            <h1 class="hero-titre">Votre bibliothèque, <em>organisée</em> simplement</h1>
            <p class="hero-texte">
                Cette plateforme centralise la gestion des auteurs, des livres, des exemplaires,
                des inscrits et des emprunts — pour suivre en un coup d'œil ce qui est disponible,
                ce qui est emprunté, et à qui.
            </p>
            <div class="d-flex gap-2 flex-wrap">
                <span class="badge rounded-pill text-bg-light border px-3 py-2">📚 Catalogue centralisé</span>
                <span class="badge rounded-pill text-bg-light border px-3 py-2">🔄 Suivi des emprunts</span>
                <span class="badge rounded-pill text-bg-light border px-3 py-2">⭐ Score de fidélité</span>
            </div>
        </div>

        <div class="hero-image-wrap fade-up delay-2">
            <img src="assets/images/pngwing.com (1).png" alt="Rayonnages d'une bibliothèque">
            <div class="hero-badge">
                <span class="num">100%</span>
                <span class="lbl">numérique<br>&amp; centralisé</span>
            </div>
        </div>
    </section>

    <!-- Fonctionnalités -->
    <section class="section-fonctionnalites">
        <h2 class="section-titre fade-up">Un module pour chaque besoin</h2>
        <p class="section-soustitre fade-up delay-1">
            Chaque fiche est reliée aux autres — un livre à son auteur, un exemplaire à son livre,
            un emprunt à un inscrit et à un exemplaire précis.
        </p>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4 fade-up delay-1">
                <div class="feature-card">
                    <div class="feature-icone">✍️</div>
                    <h5>Auteurs</h5>
                    <p>Enregistre chaque auteur avec sa nationalité et sa date de naissance, pour retrouver facilement tous ses ouvrages.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 fade-up delay-2">
                <div class="feature-card">
                    <div class="feature-icone">📙</div>
                    <h5>Livres</h5>
                    <p>Catalogue chaque titre par genre et année de publication, relié directement à son auteur.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 fade-up delay-3">
                <div class="feature-card">
                    <div class="feature-icone">📦</div>
                    <h5>Exemplaires</h5>
                    <p>Suis le stock physique de chaque livre : état, disponibilité, et combien de copies existent.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 fade-up delay-1">
                <div class="feature-card">
                    <div class="feature-icone">👤</div>
                    <h5>Inscrits</h5>
                    <p>Gère les usagers de la bibliothèque et leur score de fidélité, ajusté selon leurs retours à temps.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 fade-up delay-2">
                <div class="feature-card">
                    <div class="feature-icone">🔄</div>
                    <h5>Emprunts</h5>
                    <p>Enregistre un emprunt, suis son échéance, et marque un retour en un clic.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 fade-up delay-3">
                <div class="feature-card">
                    <div class="feature-icone">🔔</div>
                    <h5>Alertes</h5>
                    <p>Repère immédiatement les emprunts en retard grâce au suivi automatique des échéances.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bandeau -->
    <div class="bandeau fade-up delay-4">
        <div>
            <h4>Prêt·e à commencer ?</h4>
            <p>Utilise le menu à gauche pour ajouter un auteur, un livre, ou consulter les emprunts en cours.</p>
        </div>
        <span style="font-size: 2rem;">📖</span>
    </div>

</body>
</html>