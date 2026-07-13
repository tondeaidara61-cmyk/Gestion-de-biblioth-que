<?php
session_start();

require_once __DIR__ . '/../../../models/classes/Auteur.php';
require_once __DIR__ . '/../../../repositories/donnees/AuteurRepository.php';

$repo = new AuteurRepository();
$auteurs = $repo->afficherAuteurs();

$message = $_SESSION['message'] ?? null;
$messageType = $_SESSION['message_type'] ?? null;
unset($_SESSION['message'], $_SESSION['message_type']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des auteurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../assets/css/couleur.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">✍️ Auteurs</h4>
        <a href="../auteur.php" class="btn btn-sauge">+ Ajouter un auteur</a>
    </div>

    <?php if ($message): ?>
        <div class="alert alert-<?= htmlspecialchars($messageType) ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <?php if (empty($auteurs)): ?>
                <p class="text-muted text-center py-4 mb-0">Aucun auteur enregistré pour le moment.</p>
            <?php else: ?>
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Nationalité</th>
                            <th>Date de naissance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($auteurs as $auteur): ?>
                        <tr>
                            <td><?= htmlspecialchars($auteur->getNom()) ?></td>
                            <td><?= htmlspecialchars($auteur->getPrenom()) ?></td>
                            <td><?= htmlspecialchars($auteur->getNationnatile() ?? '—') ?></td>
                            <td><?= htmlspecialchars($auteur->getDate_de_naissance() ?? '—') ?></td>
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