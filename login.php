<?php
    session_start();
    require "koneksi.php";

    $usernameInput = "UserBaru"; 
    $passwordInput = "rahasia123";

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $usernameInput);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($passwordInput, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            echo "Login Berhasil";
        } else {
            echo "Username atau Password salah!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }   
?>