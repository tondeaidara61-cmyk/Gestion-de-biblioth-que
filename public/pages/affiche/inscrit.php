<?php
session_start();

require_once __DIR__ . '/../../../models/classes/Inscrit.php';
require_once __DIR__ . '/../../../repositories/donnees/InscritRepository.php';

$repo = new InscritRepository();
$inscrits = $repo->afficherInscrits(); // retourne un tableau d'objets Inscrit

$message = $_SESSION['message'] ?? null;
$messageType = $_SESSION['message_type'] ?? null;
unset($_SESSION['message'], $_SESSION['message_type']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des inscrits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="../../assets/css/couleur.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">👤 Inscrits</h4>
        <a href="../inscrit.php" class="btn btn-sauge">+ Ajouter un inscrit</a>
    </div>

    <?php if ($message): ?>
        <div class="alert alert-<?= htmlspecialchars($messageType) ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <?php if (empty($inscrits)): ?>
                <p class="text-muted text-center py-4 mb-0">Aucun inscrit enregistré pour le moment.</p>
            <?php else: ?>
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>E-mail</th>
                            <th>Téléphone</th>
                            <th>Score de fidélité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inscrits as $inscrit): ?>
                        <tr>
                            <td><?= htmlspecialchars($inscrit->getNom()) ?></td>
                            <td><?= htmlspecialchars($inscrit->getPrenom()) ?></td>
                            <td><?= htmlspecialchars($inscrit->getEmail()) ?></td>
                            <td><?= htmlspecialchars($inscrit->getNumero() ?? '—') ?></td>
                            <td>
                                <span class="badge bg-<?= $inscrit->getScoreFidelite() >= 0 ? 'success' : 'danger' ?>">
                                    <?= htmlspecialchars($inscrit->getScoreFidelite()) ?>
                                </span>
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