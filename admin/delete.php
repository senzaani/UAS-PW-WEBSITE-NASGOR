<?php
include '../db.php';

$id = $_GET['id'];
$sql = "SELECT image FROM menus WHERE id = $id";
$result = $conn->query($sql);
$menu = $result->fetch_assoc();

if ($menu) {
    $imagePath = "../uploads/" . $menu['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $sql = "DELETE FROM menus WHERE id = $id";
    if ($conn->query($sql)) {
        header('Location: index.php');
    }
}
?>