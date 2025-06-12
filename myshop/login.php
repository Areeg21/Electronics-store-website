<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (!empty($email) && !empty($password)) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if (password_verify($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                header("Location: indexx.html");
            } else {
                echo "❌ Wrong password!";
            }
        } else {
            echo "❌ User not found!";
        }

        $stmt->close();
    } else {
        echo "❌ Please enter email and password.";
    }
    $conn->close();
}
?>
