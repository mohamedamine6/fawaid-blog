<?php
$conn = require "../config/db.php";

if (!isset($_GET['id'])) {
    die("ID article manquant");
}

$id = $_GET["id"];

// Récupérer l'article pour supprimer l'image

$query = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Article non trouvé");
}

$post = mysqli_fetch_assoc($result);

//  Supprimer l'image du dossier

if (!empty($post['image'])) {
    $imagePath = "../assets/images/" . $post['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

// Supprimer l'article
$delete = "DELETE FROM posts WHERE id = $id";

if (mysqli_query($conn, $delete)) {
    header("Location: dashboard.php");
    exit();
} else {
    die("Erreur : " . mysqli_error($conn));
}
?>