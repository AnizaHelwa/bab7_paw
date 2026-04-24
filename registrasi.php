<?php
    require "koneksi.php";
    if (!$conn) {
        die("Koneksi belum siap."); 
    }

    $usernameInsert = "UserBaru";
    $passwordInput = "rahasia123";
    $passwordInsert = password_hash($passwordInput, PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $usernameInsert); 
        $stmt->bindParam(':password', $passwordInsert); 
    
        $stmt->execute(); 
        echo "Registrasi berhasil!"; 
    } catch (PDOException $e) {
        echo "Gagal Registrasi: " . $e->getMessage(); 
    }
?>