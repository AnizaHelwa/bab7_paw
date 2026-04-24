<?php
    session_start();
    require "koneksi.php";
    
    $idDelete = $_SESSION['user_id'];

    try {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $idDelete);
        $stmt->execute();

        session_unset();
        session_destroy();

        echo "Akun telah dihapus dan Anda telah logout";
    } catch (PDOException) {
        echo "Error: " . $e->getMessage();
    }
?>