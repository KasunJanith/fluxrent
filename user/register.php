<?php

include('../includes/config.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $fullName = htmlspecialchars(trim($_POST['FullName']));
    $email = filter_var($_POST['EmailId'], FILTER_VALIDATE_EMAIL);
    $password = $_POST['Password'];
    $confirm_password = $_POST['ConfirmPassword'];
    $contactNo = htmlspecialchars(trim($_POST['ContactNo']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $address = htmlspecialchars(trim($_POST['Address']));
    $city = htmlspecialchars(trim($_POST['City']));
    $country = htmlspecialchars(trim($_POST['Country']));
    $regDate = date('Y-m-d'); 
    $updationDate = date('Y-m-d'); 

    
    if (!$email) {
        $message = "Please enter a valid email address.";
    } elseif ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } elseif (empty($contactNo) || !preg_match('/^\+?[0-9]{7,15}$/', $contactNo)) {
        $message = "Please enter a valid contact number.";
    } else {
       
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            
            $stmt = $dbh->prepare("
                INSERT INTO tblusers (FullName, EmailId, Password, ContactNo, dob, Address, City, Country, RegDate, UpdationDate) 
                VALUES (:FullName, :EmailId, :Password, :ContactNo, :dob, :Address, :City, :Country, :RegDate, :UpdationDate)
            ");

           
            $stmt->bindParam(':FullName', $fullName);
            $stmt->bindParam(':EmailId', $email);
            $stmt->bindParam(':Password', $hashed_password);
            $stmt->bindParam(':ContactNo', $contactNo);
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':Address', $address);
            $stmt->bindParam(':City', $city);
            $stmt->bindParam(':Country', $country);
            $stmt->bindParam(':RegDate', $regDate);
            $stmt->bindParam(':UpdationDate', $updationDate);

            
            $stmt->execute();

          
            if ($stmt->rowCount() > 0) {
                header("Location:../admin/index.php");
                exit;
            } else {
                $message = "Failed to insert data.";
            }
        } catch(PDOException $e) {
            
            $message = "Database Error: " . $e->getMessage();
        }
    }
}
?>