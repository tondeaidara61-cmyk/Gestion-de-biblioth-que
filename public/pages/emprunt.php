<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Emprunt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nouvel emprunt</h4>
                </div>
                <div class="card-body">

                    <form method="POST" action="">

                        <div class="mb-3">
                            <label for="id_exemplaire" class="form-label">Exemplaire <span class="text-danger">*</span></label>
                             <input type="text" class="form-control" id="titre_livre" name="titre_livre" required
                                   placeholder="Ex: Le Petit Prince" onchange="verification_livre()">
                                   <div class="form-text" id="reponse1"></div>  
                        </div>

                        <div class="mb-3">
                            <label for="id_inscrit" class="form-label">Inscrit <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required onchange="verification_email()">
                             <div class="form-text" id="reponse2"></div> 
                        </div>

                        <div class="mb-3">
                            <label for="date_emprunt" class="form-label">Date d'emprunt <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="date_emprunt" name="date_emprunt" required>
                        </div>

                        <div class="mb-4">
                            <label for="delai_jours" class="form-label">Délai (jours) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="delai_jours" name="delai_jours"
                                   min="1" max="30" value="14" required>
                            <div class="form-text">Maximum 30 jours.</div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="emprunts.php" class="btn btn-outline-secondary">Annuler</a>
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