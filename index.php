<?php

    include 'config/db.php';

    $query = "SELECT posts.*, categories.name AS category_name

        FROM posts

        JOIN categories

        ON posts.category_id = categories.id

        ORDER BY posts.id DESC";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فوائد</title>

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

    <section class="hero d-flex align-items-center">

        <div class="container">

            <div class="row justify-content-end">

                <div class="col-md-6 text-end text-white">

                    <h1 class="hero-title">
                        اكتشف فوائد الأطعمة الطبيعية لصحتك
                    </h1>

                    <p class="hero-text">
                        مقالات عربية مفيدة حول التغذية والصحة والأعشاب الطبيعية
                    </p>

                    <a href="#" class="btn btn-success btn-lg px-4 py-2 fw-bold">
                        تصفح المقالات
                    </a>

                </div>

            </div>

        </div>

    </section>

    <!-- ARTICLES -->

    <section class="posts py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="fw-bold">
                    أحدث المقالات
                </h2>

                <p>
                    اكتشف أفضل المقالات الصحية والغذائية
                </p>

            </div>

            <div class="row g-4">

                <!-- ARTICLE -->
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4">
                    
                    <div class="card post-card h-100">
                        
                        <img src="assets/images/<?php echo $row['image']; ?>" class="card-img-top" alt="banana">

                        <div class="card-body">

                            <span class="badge bg-success mb-2">
                                <?php echo $row['category_name']; ?>
                            </span>

                            <h5 class="card-title">
                                <?php echo $row['title']; ?>
                            </h5>

                            <p class="card-text">
                                <?php echo $row['content']; ?>
                            </p>

                            <a href="post.php?id=<?php echo $row['id']; ?>" class="btn btn-dark">
                                اقرأ المزيد
                            </a>

                        </div>

                    </div>

                </div>
                <?php } ?>
            </div>

        </div>

    </section>


    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>