<?php
$conn = require "../config/db.php";

$categories = mysqli_query($conn, "SELECT * FROM categories");

if(isset($_POST['add'])){

    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];

    $image = $_FILES['image']['name'];

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "../assets/images/".$image
    );

    $query = "INSERT INTO posts
              (title, content, image, category_id)

              VALUES

              ('$title','$content','$image','$category_id')";

    mysqli_query($conn, $query);

    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - تسجيل الدخول</title>

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
                        
                        <p class="text-muted small">إضافة مقال</p>

                    </div>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="input-group-custom mb-3">
                            <i class="bx bx-envelope input-icon"></i>
                            <input type="text" name="title" class="form-control custom-input" placeholder="عنوان المقال">
                        </div>

                        <div class="input-group-custom mb-4">
                            <textarea name="content" class="form-control custom-input" rows="8" placeholder="محتوى المقال"></textarea>
                        </div>

                        <div class="input-group-custom mb-4">
                            <i class='bx bxs-image-add input-icon'></i>
                            <input type="file" name="image" class="form-control custom-input">
                        </div>
                        
                        <select name="category_id" class="input-group-custom form-control custom-input mb-4">
                            
                            <option value="">
                                اختر التصنيف
                            </option>
                            <?php while($cat = mysqli_fetch_assoc($categories)){ ?>
                                    <option value="<?php echo $cat['id']; ?>">
                                        <?php echo $cat['name'] ?>
                                    </option>
                            <?php } ?>
                        </select>

                        <button name="add" class="btn btn-success w-100 py-2.5 fw-bold login-btn rounded-3">
                            <i class='bx bxs-message-alt-add align-middle me-1'></i> نشر المقال 
                        </button>
                    </form>

                </div> 

            </div> 

        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>