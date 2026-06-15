<?php
session_start();

$conn = require "../config/db.php";

// isset vérifie si une variable est définie et non null
if (isset($_POST['login'])){

    $email = $_POST['email'];
    $passaword = $_POST['password'];

    $query = "SELECT * FROM admins 
                WHERE email = '$email'
                AND password = '$passaword'";

    // mysqli_query exécute une requête SQL sur la base connectée
    $result = mysqli_query($conn, $query);

    // mysqli_num_rows retourne le nombre de lignes du résultat SELECT
    if (mysqli_num_rows($result) > 0){

        $_SESSION['admin'] = $email;

        header("location: dashboard.php");

    }else{
        $error = "المعلومات غير صحيحة";
    }

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
                        
                        <div class="admin-icon-box bg-success-subtle text-success mx-auto mb-3">
                            <i class="bx bx-shield-quarter"></i>
                        </div>

                        <h2 class="fw-bold text-dark fs-3 mb-1">لوحة التحكم</h2>
                        <p class="text-muted small">سجل دخولك لإدارة موقع فوائد</p>

                    </div>

                    <?php if(isset($error)){ ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>

                    <form method="POST">

                        <div class="input-group-custom mb-3">
                            <i class="bx bx-envelope input-icon"></i>
                            <input type="email" name="email" class="form-control custom-input" placeholder="البريد الإلكتروني">
                        </div>

                        <div class="input-group-custom mb-4">
                            <i class="bx bx-lock-alt input-icon"></i>
                            <input type="password" name="password" class="form-control custom-input" placeholder="كلمة المرور">
                        </div>

                        <button name="login" type="submit" class="btn btn-success w-100 py-2.5 fw-bold login-btn rounded-3">
                            <i class="bx bx-log-in-circle align-middle me-1"></i> دخول 
                        </button>

                </div> 

            </div> 

        </div>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>