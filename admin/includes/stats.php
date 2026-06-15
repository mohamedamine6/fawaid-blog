<?php
if (!isset($conn)) {
    $conn = require __DIR__ . "/../../config/db.php";
}

$totalPosts = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM posts"))['total'];
$totalCategories = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM categories"))['total'];
?>

<div class="row g-4 dashboard-stats-grid">

    <div class="col-md-4">

        <div class="card border-0 shadow-sm stat-card stat-card-posts h-100">

            <div class="card-body">
                <div class="stat-card-icon bg-success-subtle text-success">
                    <i class='bx bx-news'></i>
                </div>

                <h6 class="text-muted mb-2">
                    Nombre d'articles
                </h6>

                <h2 class="fw-bold text-success mb-0">
                    <?php echo $totalPosts; ?>
                </h2>

                <p class="stat-card-footnote mb-0">Publications disponibles</p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm stat-card stat-card-categories h-100">

            <div class="card-body">
                <div class="stat-card-icon bg-primary-subtle text-primary">
                    <i class='bx bx-category'></i>
                </div>

                <h6 class="text-muted mb-2">
                    Catégories
                </h6>

                <h2 class="fw-bold text-primary mb-0">
                    <?php echo $totalCategories; ?>
                </h2>

                <p class="stat-card-footnote mb-0">Organisation du contenu</p>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm stat-card stat-card-admin h-100">

            <div class="card-body">
                <div class="stat-card-icon bg-danger-subtle text-danger">
                    <i class='bx bx-user'></i>
                </div>

                <h6 class="text-muted mb-2">
                    Administrateur
                </h6>

                <h2 class="fw-bold text-danger mb-0">
                    1
                </h2>

                <p class="stat-card-footnote mb-0">Compte actif connecté</p>

            </div>

        </div>

    </div>

</div>