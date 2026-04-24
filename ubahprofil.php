<?php
    session_start();
    require "koneksi.php";
    
    if (!isset($_SESSION['user_id'])) {die("Silakan login dulu");}

    $usernameUpdate = "AnizaHelwa123";
    $idChange = $_SESSION['user_id'];
    
    try {
        $stmt = $conn->prepare("UPDATE users SET username = :username WHERE id = :id");
        $stmt->bindParam(':username', $usernameUpdate);
        $stmt->bindParam(':id', $idChange);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['username'] = $usernameUpdate;
            echo "Profil berhasil diupdate!";
        } else {
            echo "Tidak ada perubahan atau gagal update";
        }
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }
?>