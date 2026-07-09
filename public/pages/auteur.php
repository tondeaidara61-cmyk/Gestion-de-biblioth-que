<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Auteur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="../assets/css/auteur.css?v='<?= time()  ?>'" rel="stylesheet">
    
</head>
<body>

<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Ajouter un auteur</h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="traitement/traitement_auteur.php">

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>

                        <div class="mb-3">
                            <label for="nationalite" class="form-label">Nationalité</label>
                            <input type="text" class="form-control" id="nationalite" name="nationalite">
                        </div>

                        <div class="mb-4">
                            <label for="date_naissance" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="auteur.php" class="btn btn-outline-secondary">Annuler</a>
                            <button type="submit"  class="btn btn-primary">Enregistrer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>