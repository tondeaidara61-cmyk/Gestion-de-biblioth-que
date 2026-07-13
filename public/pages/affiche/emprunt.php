<?php
session_start();

require_once __DIR__ . '/../../../models/classes/Emprunt.php';
require_once __DIR__ . '/../../../repositories/donnees/EmpruntRepository.php';

$repo = new EmpruntRepository();
$emprunts = $repo->afficherEmpruntsEnCours();

$message = $_SESSION['message'] ?? null;
$messageType = $_SESSION['message_type'] ?? null;
unset($_SESSION['message'], $_SESSION['message_type']);

$aujourdhui = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des emprunts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="../../assets/css/couleur.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">🔄 Emprunts en cours</h4>
        <a href="../emprunt.php" class="btn btn-sauge">+ Nouvel emprunt</a>
    </div>

    <?php if ($message): ?>
        <div class="alert alert-<?= htmlspecialchars($messageType) ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <?php if (empty($emprunts)): ?>
                <p class="text-muted text-center py-4 mb-0">Aucun emprunt en cours.</p>
            <?php else: ?>
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Livre</th>
                            <th>Inscrit</th>
                            <th>Date d'emprunt</th>
                            <th>Échéance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($emprunts as $emprunt): ?>
                        <?php $enRetard = $emprunt['date_echeance'] < $aujourdhui; ?>
                        <tr class="<?= $enRetard ? 'table-danger' : '' ?>">
                            <td><?= htmlspecialchars($emprunt['titre']) ?></td>
                            <td><?= htmlspecialchars($emprunt['prenom_inscrit'] . ' ' . $emprunt['nom_inscrit']) ?></td>
                            <td><?= htmlspecialchars($emprunt['date_emprunt']) ?></td>
                            <td>
                                <?= htmlspecialchars($emprunt['date_echeance']) ?>
                                <?php if ($enRetard): ?>
                                    <span class="badge bg-danger ms-1">En retard</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <form method="POST" action="traitement/traitement_retour.php" class="d-inline">
                                    <input type="hidden" name="id_emprunt" value="<?= $emprunt['id_emprunt'] ?>">
                                    <button type="submit" class="btn btn-sm btn-success">Marquer comme rendu</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>

</div>

</body>
</html>