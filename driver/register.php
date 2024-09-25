<?php
// Include the database connection configuration
include('../includes/config.php');

// Initialize a message variable for feedback
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $phone = htmlspecialchars(trim($_POST['phone']));
    $city = htmlspecialchars(trim($_POST['city']));

    // Validate input
    if (!$age || $age <= 0) {
        $message = "Please enter a valid age.";
    } elseif (!$email) {
        $message = "Please enter a valid email address.";
    } elseif ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } elseif (empty($phone) || !preg_match('/^\+?[0-9]{7,15}$/', $phone)) {
        $message = "Please enter a valid phone number.";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Prepare the SQL statement
            $stmt = $dbh->prepare("INSERT INTO drivers (name, age, email, password, phone, city) VALUES (:name, :age, :email, :password, :phone, :city)");

            // Bind parameters to the SQL query
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':city', $city);

            // Execute the query
            $stmt->execute();

         // Redirect to the home page
         header("Location: index.php");
         exit; // Ensure no further code is executed after the redirect
     } catch(PDOException $e) {
         // Handle database errors gracefully
         $message = "Error: " . $e->getMessage();
        }
    }
}
?>