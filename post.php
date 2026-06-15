<?php
include 'config/db.php';

// Sécurisation de l'ID contre les injections SQL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($conn, $query);

$post = mysqli_fetch_assoc($result);

// Si l'article n'existe pas
if (!$post) {
    echo "المقال غير موجود.";
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?> - فوائد</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/animations.min.css"
        integrity="sha512-GKHaATMc7acW6/GDGVyBhKV3rST+5rMjokVip0uTikmZHhdqFWC7fGBaq6+lf+DOS5BIO8eK6NcyBYUBCHUBXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php include 'includes/navbar.php'; ?>

    <section class="post-section py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <article class="blog-post bg-white p-4 p-md-5 rounded-4 shadow-sm">

                        <h1 class="post-title
                            mb-4 text-center text-success fw-bold">
                            <?php echo htmlspecialchars($post['title']); ?>
                        </h1>

                        <div class="post-img-container mb-4 overflow-hidden rounded-4 shadow-sm">
                            <img src="assets/images/<?php echo htmlspecialchars($post['image']); ?>" class="img-fluid mb-4" alt="<?php echo htmlspecialchars($post['title']); ?>">
                        </div>

                        <div class="post-content lh-lg text-secondary fs-5 pt-3">
                            <p class="post-content fs-5">
                                <?php echo htmlspecialchars($post['content']); ?>
                            </p>
                        </div>

                    </article>

                </div>
            
            </div>

        </div>

    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
