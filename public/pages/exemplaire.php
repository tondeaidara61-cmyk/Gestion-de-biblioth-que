<?php
session_start();
require_once __DIR__ . '/../../models/classes/Exemplaire.php';
require_once __DIR__ . '/../../repositories/donnees/ExemplaireRepository.php';


$message = $_SESSION['message'] ?? null;
$messageType = $_SESSION['message_type'] ?? null;
// On efface immédiatement pour que le message ne réapparaisse pas au rafraîchissement
unset($_SESSION['message'], $_SESSION['message_type']);

$input = json_decode(file_get_contents("php://input"),true);
if (!empty($input)) {
      if ($input['action'] === "EnvoyerTitreDuLibre") {
          $titre = $input['input'];

          $exemplaire = new Exemplaire(null,'','','',$titre);
          $RepoExemplaire = new ExemplaireRepository();

          $SiLivreExiste = $RepoExemplaire ->VerifieSiLIvreExiste($exemplaire);

         
          if ($SiLivreExiste == null) {
               echo json_encode(["status"=>false]);
              
          } else {
               $_SESSION['idLivre']=$SiLivreExiste;
                echo json_encode(["status"=>true]);
             
          }
            die();
      }
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Exemplaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/couleur.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-sauge text-white">
                    <h4 class="mb-0">Ajouter un exemplaire</h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="traitement/traitement_exemplaire.php">

                        <div class="mb-3">
                            <label for="titre_livre" class="form-label">Livre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="titre_livre" name="titre_livre" required
                                   placeholder="Ex: Le Petit Prince" onchange="verification_livre()">
                                   <div class="form-text" id="reponse"></div>  
                        </div>

                        <div class="mb-3">
                            <label for="etat" class="form-label">État <span class="text-danger">*</span></label>
                            <select class="form-select" id="etat" name="etat" required>
                                <option value="Neuf">Neuf</option>
                                <option value="Bon" selected>Bon</option>
                                <option value="Usé">Usé</option>
                                <option value="Endommagé">Endommagé</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="quantite" class="form-label">Quantité <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="quantite" name="quantite"
                                   min="1" max="50" value="1" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="exemplaires.php" class="btn btn-outline-secondary">Annuler</a>
                            <button type="submit" class="btn btn-sauge" id="enregistrer" >Enregistrer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     const message = <?= json_encode($message) ?>;
     const TypeMessage = <?= json_encode($messageType) ?>;
      if (message) {
        const alerte = document.createElement('div');
        alerte.className = `alert alert-${TypeMessage}`;
        alerte.textContent = message;

        const form = document.querySelector('form');
        form.parentNode.insertBefore(alerte, form);
    }
</script>
</body>
<script src="../assets/js/fonction_verificationLivre.js"> </script>
</html>