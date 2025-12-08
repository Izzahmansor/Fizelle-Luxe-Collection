<?php
session_start();

// Hardcoded users (puppet emails)
$users = [
    [
        "email" => "customer@test.com",
        "password" => "customer123",
        "role" => "customer"
    ],
    [
        "email" => "staff@test.com",
        "password" => "staff123",
        "role" => "staff"
    ],
    // You can add more users if needed
];

// Get login info from form
$email = $_POST['email'];
$password = $_POST['password'];

// Check credentials
$authenticated = false;

foreach($users as $user){
    if($user['email'] === $email && $user['password'] === $password){
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $authenticated = true;

        // Redirect based on role
        if($user['role'] === "customer"){
            header("Location: customer.php");
            exit();
        } else if($user['role'] === "staff" || $user['role'] === "admin"){
            header("Location: adminpage.php");
            exit();
        }
    }
}

// If login failed
if(!$authenticated){
    echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
}
?>
