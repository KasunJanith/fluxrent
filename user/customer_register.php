<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flux Rent - Customer Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <br><br><br>
    <main>
        <div class="center-image">
            <div class="card">
                <div id="form-container" class="col-10">
                    <?php if (!empty($message)): ?>
                        <div class="message">
                            <p><?php echo $message; ?></p>
                        </div>
                    <?php endif; ?>
                    <form class="register-form" action="register.php" method="POST">
                        <h2>Customer Register Account</h2>
                        <input type="text" name="FullName" placeholder="Your Full Name" required>
                        <input type="email" name="EmailId" placeholder="Your Email" required>
                        <input type="password" name="Password" placeholder="Password" required>
                        <input type="password" name="ConfirmPassword" placeholder="Confirm Password" required>
                        <input type="tel" name="ContactNo" placeholder="Contact Number" required>
                        <input type="date" name="dob" placeholder="Date of Birth" required>
                        <input type="text" name="Address" placeholder="Address" required>
                        <input type="text" name="City" placeholder="City" required>
                        <input type="text" name="Country" placeholder="Country" required>
                        <div class="terms">
                            <input type="checkbox" required>
                            <label>I agree to <a href="#">Terms of Service</a> & <a href="#">Privacy Policy</a></label>
                        </div>
                        <button type="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
