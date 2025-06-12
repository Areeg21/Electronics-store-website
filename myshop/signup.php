<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $birthdate = $_POST["birthdate"];

    if (!empty($name) && !empty($email) && !empty($password) && !empty($birthdate)) {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, birthdate) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $birthdate);
        if ($stmt->execute()) {
            header("Location: indexx.html");
        } else {
            echo "❌ Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "❌ Please fill all the fields.";
    }
    $conn->close();
}
?>
