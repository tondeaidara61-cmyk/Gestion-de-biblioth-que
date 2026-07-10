<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Inscrit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
          <link href="../assets/css/inscrit.css?v='<?= time()  ?>'" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">👤 Ajouter un inscrit</h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="traitement/traitement_inscrit.php">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="prenom" name="prenom" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="form-text">Doit être unique et valide.</div>
                        </div>

                        <div class="mb-4">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone"
                                   placeholder="Ex: 07 00 00 00 00">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="inscrit.php" class="btn btn-outline-secondary">Annuler</a>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>