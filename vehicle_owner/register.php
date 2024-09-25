<?php
// Include the database connection configuration
include('../includes/config.php');

// Initialize a message variable for feedback
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $password = $_POST['password'];
    $vehicle_number = htmlspecialchars(trim($_POST['vehicle_number']));
    $vehicle_model = htmlspecialchars(trim($_POST['vehicle_model']));
    $vehicle_category = htmlspecialchars(trim($_POST['vehicle_category']));
    $city = htmlspecialchars(trim($_POST['city']));

    // Validate input
    if (!$age || $age <= 0) {
        $message = "Please enter a valid age.";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
        $message = "Please enter a valid phone number.";
    } elseif (empty($password)) {
        $message = "Password cannot be empty.";
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Prepare the SQL statement
            $stmt = $dbh->prepare("INSERT INTO vehicle_owners (name, age, phone, password, vehicle_number, vehicle_model, vehicle_category, city) VALUES (:name, :age, :phone, :password, :vehicle_number, :vehicle_model, :vehicle_category, :city)");

            // Bind parameters to the SQL query
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':vehicle_number', $vehicle_number);
            $stmt->bindParam(':vehicle_model', $vehicle_model);
            $stmt->bindParam(':vehicle_category', $vehicle_category);
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