<?php
//Charger article + catégories
$conn = require "../config/db.php";

$id = $_GET["id"];

$query = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($conn, $query);

$post = mysqli_fetch_assoc($result);

$categories = mysqli_query($conn, "SELECT * FROM categories");

//Update article
if (isset($_POST['update'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $image = $_POST['image'];
    
    //nouvelle image
    if (empty($_FILES['image']['name'])) {

        $image = $_FILES['image']['name'];

        move_uploaded_file(
            $image = $_FILES['image']['name'],
            "../assets/images/".$image
        );
    }

    $update = "UPDATE posts SET
    title='$title',
    content='$content',
    image='$image',
    category_id='$category_id'
    WHERE id = $id";

    mysqli_query($conn, $update);

    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المقال</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/animations.min.css"
        integrity="sha512-GKHaATMc7acW6/GDGVyBhKV3rST+5rMjokVip0uTikmZHhdqFWC7fGBaq6+lf+DOS5BIO8eK6NcyBYUBCHUBXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body class="admin-login-body">
    <div class="container">

        <div class="row justify-content-center vh-100 align-items-center">

            <div class="col-md-5 col-lg-4">

                <div class="card admin-card border-0 p-4 p-md-5 shadow-lg rounded-4 animate__animated animate__fadeIn">

                   <div class="text-center mb-4">
                        
                        <p class="text-muted small">تعديل المقال</p>

                    </div>

                    <form method="POST" enctype="multipart/form-data">

                        <!-- TITLE -->

                        <div class="input-group-custom mb-3">
                            <i class="bx bx-envelope input-icon"></i>
                            <input type="text" name="title" class="form-control custom-input" value="<?php echo $post['title']; ?>">
                        </div>

                        <!-- CONTENT -->

                        <div class="input-group-custom mb-4">
                            <textarea name="content" class="form-control custom-input" rows="8"><?php echo $post['content']; ?></textarea>
                        </div>

                        <!-- IMAGE -->

                        <div class="input-group-custom mb-4">
                            <img src="../assets/images/<?php echo $post['image']; ?>" alt="" width="150" class="mb-3 rounded">
                            <i class='bx bxs-image-add input-icon'></i>
                            <input type="file" name="image" class="form-control custom-input">
                        </div>
                        
                        <!-- CATEGORY -->

                        <select name="category_id" class="input-group-custom form-control custom-input mb-4">
                            <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>
                                <option value="<?php echo $cat['id']; ?>">
                                    <?php
                                    if($cat['id'] == $post['category_id']){
                                       
                                    }
                                    ?>
                                    <?php echo $cat['name']; ?>
                                </option>
                            <?php } ?>
                        </select>

                        <button name="update" class="btn btn-success w-100 py-2.5 fw-bold login-btn rounded-3">
                            <i class='bx bxs-message-alt-add align-middle me-1'></i> تحديث المقال
                        </button>
                    </form>

                </div> 

            </div> 

        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>