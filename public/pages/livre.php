<?php
require_once __DIR__ . '/../../repositories/donnees/AuteurRepository.php';
require_once __DIR__ . '/../../repositories/donnees/LivreRepository.php';
require_once __DIR__ . '/../../models/classes/Exemplaire.php';
require_once __DIR__ . '/../../repositories/donnees/ExemplaireRepository.php';



$input = json_decode(file_get_contents("php://input"),true);
if(!empty($input))
    {
        if ($input['action'] === 'EnvoyerTitreDuLivre') {
            $titre = $input['input'];

            $livre = new Exemplaire(null,'','','',$titre);
            $repo = new ExemplaireRepository();

            $resultat = $repo->VerifieSiLIvreExiste($livre);

            if ($resultat === null) {
                echo json_encode(['status' => true]);
            } else {
                  echo json_encode(['status' => 'OuiExiste']);
            }
            die();
        }
    }

$titrePreRempli = $_GET['titre'] ?? '';
// ---------- Traitement AJAX (avant tout affichage HTML) ----------
if (isset($_GET['fonct']) && $_GET['fonct'] === 'checkAuteur') {
    header('Content-Type: application/json');

    $nom = $_GET['nom'] ?? '';
    $prenom = $_GET['prenom'] ?? '';

    $repo = new AuteurRepository();
    $auteur = $repo->trouverParNomPrenom($nom, $prenom);

    echo json_encode([
        'exists' => $auteur !== null,
        'id_auteur' => $auteur?->getIdAuteur(),
    ]);
    exit; // important : on arrête tout ici, pas de HTML après
}

// ---------- Sinon, affichage normal de la page ----------
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="../assets/css/couleur.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-sauge text-white">
                    <h4 class="mb-0">📙 Ajouter un livre</h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="traitement/traitement_livre.php" id="formLivre">

                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control"
                             id="titre_livre" name="titre" required onchange="verification_livrePourLivre('livre')" value="<?= htmlspecialchars($titrePreRempli) ?>">
                                <div class="form-text" id="reponse"></div>  
                        </div>

                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre <span class="text-danger">*</span></label>
                            <select class="form-select" id="genre" name="genre" required>
                                <option value="" selected disabled>Choisir un genre</option>
                                <option value="Science Fiction">Science Fiction</option>
                                <option value="Roman">Roman</option>
                                <option value="Policier">Policier</option>
                                <option value="Fantastique">Fantastique</option>
                                <option value="Biographie">Biographie</option>
                                <option value="Histoire">Histoire</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="annee_publication" class="form-label">Année de publication</label>
                            <input type="number" class="form-control" id="annee_publication" name="annee_publication"
                                   min="1000" max="2100" placeholder="Ex: 2023">
                        </div>

                        <hr class="my-4">
                        <h6 class="text-muted mb-3">Auteur</h6>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nom_auteur" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nom_auteur" name="nom_auteur" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="prenom_auteur" class="form-label">Prénom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="prenom_auteur" name="prenom_auteur" required>
                            </div>
                        </div>

                        <div id="statutAuteur" class="mb-3"></div>

                        <!-- champ caché : rempli en JS si l'auteur existe déjà -->
                        <input type="hidden" id="id_auteur" name="id_auteur" value="">

                        <!-- champs supplémentaires, cachés par défaut, affichés si l'auteur n'existe pas -->
                        <div id="nouvelAuteurFields" class="d-none border rounded p-3 bg-light mb-3">
                            <p class="small text-muted mb-3">Cet auteur n'existe pas encore, complète ses infos :</p>

                            <div class="mb-3">
                                <label for="nationalite" class="form-label">Nationalité</label>
                                <input type="text" class="form-control" id="nationalite" name="nationalite">
                            </div>

                            <div class="mb-2">
                                <label for="date_naissance" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="../accueil.php" class="btn btn-outline-secondary">Annuler</a>
                            <button type="submit" class="btn btn-sauge" id="enregistrer">Enregistrer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/fonction-verificationAuteur.js"></script>
<script src="../assets/js/fonction_verificationLivre.js"> </script>
</body>
</html>