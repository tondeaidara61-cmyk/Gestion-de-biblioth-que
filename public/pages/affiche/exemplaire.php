<?php
session_start();

require_once __DIR__ . '/../../../repositories/donnees/ExemplaireRepository.php';

$repo = new ExemplaireRepository();
$exemplaires = $repo->afficherExemplaires(); // JOIN avec Livre, retourne un tableau associatif

$message = $_SESSION['message'] ?? null;
$messageType = $_SESSION['message_type'] ?? null;
unset($_SESSION['message'], $_SESSION['message_type']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des exemplaires</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="../../assets/css/couleur.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📦 Exemplaires</h4>
        <a href="../exemplaire.php" class="btn btn-sauge">+ Ajouter des exemplaires</a>
    </div>

    <?php if ($message): ?>
        <div class="alert alert-<?= htmlspecialchars($messageType) ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            <?php if (empty($exemplaires)): ?>
                <p class="text-muted text-center py-4 mb-0">Aucun exemplaire enregistré pour le moment.</p>
            <?php else: ?>
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Livre</th>
                            <th>État</th>
                            <th>Disponibilité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($exemplaires as $ex): ?>
                        <tr>
                            <td><?= htmlspecialchars($ex['titre']) ?></td>
                            <td><?= htmlspecialchars($ex['etat']) ?></td>
                            <td>
                                <?php if ($ex['disponible']): ?>
                                    <span class="badge bg-success">Disponible</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Emprunté</span>
                                <?php endif; ?>
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