<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord - Gestion de bibliothèque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="assets/css/index.css?v=<?= time() ?>">
</head>
<body>

<div class="d-flex flex-column" style="min-height: 100vh;">

    <!-- Header -->
    <header class="topbar d-flex align-items-center justify-content-between px-4 text-white shadow-sm">
        <span class="fw-bold fs-5">📚 Gestion de Bibliothèque</span>
        <span class="small opacity-75">Bibliothécaire connecté</span>
    </header>

    <div class="d-flex flex-grow-1">

        <!-- Sidebar -->
        <nav class="sidebar p-3">

            <a href="#" class="sub-link mb-3 fw-semibold" style="color:#fff;"
               onclick="chargerPage(this, 'accueil.php')">
                🏠 Accueil
            </a>

            <div class="accordion" id="menuFonctionnalites">

                <!-- Auteurs -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseAuteur">
                            ✍️ Auteurs
                        </button>
                    </h2>
                    <div id="collapseAuteur" class="accordion-collapse collapse" data-bs-parent="#menuFonctionnalites">
                        <div class="accordion-body">
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'pages/affiche/auteur.php')">Afficher les auteurs</a>
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'pages/auteur.php')">Enregistrer un auteur</a>
                        </div>
                    </div>
                </div>

                <!-- Livres -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseLivre">
                            📙 Livres
                        </button>
                    </h2>
                    <div id="collapseLivre" class="accordion-collapse collapse" data-bs-parent="#menuFonctionnalites">
                        <div class="accordion-body">
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'pages/affiche/livre.php')">Afficher les livres</a>
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'pages/livre.php')">Enregistrer un livre</a>
                        </div>
                    </div>
                </div>

                <!-- Exemplaires -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseExemplaire">
                            📦 Exemplaires
                        </button>
                    </h2>
                    <div id="collapseExemplaire" class="accordion-collapse collapse" data-bs-parent="#menuFonctionnalites">
                        <div class="accordion-body">
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'pages/affiche/exemplaire.php')">Afficher les exemplaires</a>
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'pages/exemplaire.php')">Enregistrer un exemplaire</a>
                        </div>
                    </div>
                </div>

                <!-- Inscrits -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseInscrit">
                            👤 Inscrits
                        </button>
                    </h2>
                    <div id="collapseInscrit" class="accordion-collapse collapse" data-bs-parent="#menuFonctionnalites">
                        <div class="accordion-body">
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'pages/affiche/inscrit.php')">Afficher les inscrits</a>
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'pages/inscrit.php')">Enregistrer un inscrit</a>
                        </div>
                    </div>
                </div>

                <!-- Emprunts -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseEmprunt">
                            🔄 Emprunts
                        </button>
                    </h2>
                    <div id="collapseEmprunt" class="accordion-collapse collapse" data-bs-parent="#menuFonctionnalites">
                        <div class="accordion-body">
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'pages/affiche/emprunt.php')">Afficher les emprunts</a>
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'pages/emprunt.php')">Enregistrer un emprunt</a>
                            <a href="#" class="sub-link" onclick="chargerPage(this, 'emprunts.php')">Retourner un emprunt</a>
                        </div>
                    </div>
                </div>

            </div>
        </nav>

        <!-- Zone d'affichage des pages -->
        <main class="flex-grow-1">
            <iframe id="contentFrame" class="content-frame" src="accueil.php"></iframe>
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function chargerPage(lien, page) {
    // change le contenu affiché dans l'iframe
    document.getElementById('contentFrame').src = page;

    // gère la classe "active" sur le sous-lien cliqué
    document.querySelectorAll('.sub-link').forEach(el => el.classList.remove('active'));
    lien.classList.add('active');
}
</script>

</body>
</html>