<?php
session_start();

require_once __DIR__ . '/../../../repositories/donnees/LivreRepository.php';

$repo = new LivreRepository();
$livres = $repo->afficherLivres(); // JOIN avec Auteur, retourne un tableau associatif

$message = $_SESSION['message'] ?? null;
$messageType = $_SESSION['message_type'] ?? null;
unset($_SESSION['message'], $_SESSION['message_type']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des livres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="../../assets/css/couleur.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📙 Livres</h4>
        <a href="../livre.php" class="btn btn-sauge">+ Ajouter un livre</a>
    </div>

    <?php if ($message): ?>
        <div class="alert alert-<?= htmlspecialchars($messageType) ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <?php if (empty($livres)): ?>
                <p class="text-muted text-center py-4 mb-0">Aucun livre enregistré pour le moment.</p>
            <?php else: ?>
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Titre</th>
                            <th>Genre</th>
                            <th>Année</th>
                            <th>Auteur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($livres as $livre): ?>
                        <tr>
                            <td><?= htmlspecialchars($livre['titre']) ?></td>
                            <td><span class="badge bg-secondary"><?= htmlspecialchars($livre['genre']) ?></span></td>
                            <td><?= htmlspecialchars($livre['annee_publication'] ?? '—') ?></td>
                            <td><?= htmlspecialchars($livre['prenom_auteur'] . ' ' . $livre['nom_auteur']) ?></td>
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