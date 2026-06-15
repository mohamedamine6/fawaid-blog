<?php
$conn = require __DIR__ . "/../config/db.php";

// pagination
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($page < 1) {
    $page = 1;
}

$offset = ($page - 1) * $limit;
$totalQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM posts");
$totalRow = mysqli_fetch_assoc($totalQuery);
$totalPosts = $totalRow['total'];
$totalPages = ceil($totalPosts / $limit);

$query = "
    SELECT posts.*, categories.name AS category_name
    FROM posts
    LEFT JOIN categories ON posts.category_id = categories.id
    ORDER BY posts.id DESC
    LIMIT $offset, $limit
";

$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tableau</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/animations.min.css"
        integrity="sha512-GKHaATMc7acW6/GDGVyBhKV3rST+5rMjokVip0uTikmZHhdqFWC7fGBaq6+lf+DOS5BIO8eK6NcyBYUBCHUBXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
</head>

<body class="bg-light-subtle">
<div class="card border-0 shadow-sm rounded-4 overflow-hidden dashboard-table-shell">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0 custom-dashboard-table">

            <thead class="table-light text-secondary">

                <tr>
                    <th class="ps-4">ID</th>
                    <th>العنوان</th>
                    <th>التصنيف</th>
                    <th>صورة</th>
                    <th>فئة</th>
                    <th class="text-center" colspan="2">إجراءات</th>
                </tr>

            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="fw-bold text-muted ps-4">
                            #<?php echo $row['id']; ?>
                        </td>

                        <td class="fw-semibold text-dark text-truncate" style="max-width: 200px;">
                            <?php echo $row['title']; ?>
                        </td>

                        <td class="text-muted text-truncate" style="max-width: 250px;">
                            <?php echo $row['content']; ?>
                        </td>

                        <td>
                            <div class="table-img-wrapper rounded-3 overflow-hidden shadow-sm">
                                <img src="../assets/images/<?php echo htmlspecialchars($row['image']); ?>" alt="post-img" class="img-fluid">
                            </div>
                        </td>

                        <td>
                            <span class="badge bg-success-subtle text-success px-2.5 py-1.5 rounded-pill fw-semibold">
                                <?php echo $row['category_name']; ?>
                            </span>
                        </td>

                        <td class="text-center p-1">
                            <a href="editPost.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-action rounded-3" title="تعديل">
                                <i class="bx bx-edit-alt"></i>
                            </a>
                        </td>

                        <td class="text-center p-1 pe-4">
                            <a href="deletePost.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-action rounded-3" title="حذف" onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟');">
                                <i class="bx bx-trash"></i>
                            </a>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="dashboard-pagination">
    <ul class="pagination justify-content-center mb-0">
        <?php if ($page > 1) { ?>

            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>">
                    السابق
                </a>
            </li>

        <?php } ?>

        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>

            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>">
                    <?php echo $i; ?>
                </a>
            </li>

        <?php } ?>

        <?php if ($page < $totalPages) { ?>

            <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>">
                    التالي
                </a>
            </li>

        <?php } ?>

    </ul>
</div>