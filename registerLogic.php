<?php
include "config/db.php"; 

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if(empty($name) || empty($surname) || empty($username) || empty($email) || empty($password) || empty($confirm_password)){
        echo "Ju lutem mbushni të gjitha fushat.";
    } elseif($password !== $confirm_password) {
        echo "Fjalëkalimet nuk përputhen.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Përdorim try-catch për të kapur gabimet e databazës pa u bllokuar faqja
        try {
            $sql = "INSERT INTO users (name, surname, username, email, password) VALUES (:name, :surname, :username, :email, :password)";
            $insertsql = $connection->prepare($sql);

            $insertsql->bindParam(':name', $name);
            $insertsql->bindParam(':surname', $surname);
            $insertsql->bindParam(':username', $username);
            $insertsql->bindParam(':email', $email);
            $insertsql->bindParam(':password', $hashed_password);

            $insertsql->execute();

            header("Location: login.php");
            exit();

        } catch (PDOException $e) {
            // Kontrollojmë nëse gabimi është për shkak të username-it ose email-it ekzistues (Kodi 23000)
            if ($e->getCode() == 23000) {
                echo "<div style='color: red; font-weight: bold; padding: 10px; background: #ffe6e6; border: 1px solid red; margin: 10px;'>
                        Gabim: Ky Username ose Email është i zënë! Ju lutem provoni një tjetër.
                      </div>";
            } else {
                echo "Ndodhi një gabim i papritur: " . $e->getMessage();
            }
        }
    }
}
?>