<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flux Rent - Vehicle Owner Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <div class="center-image">
            <div class="card">
                <div id="form-container" class="col-10">
                    <?php if (!empty($message)): ?>
                        <div class="message">
                            <p><?php echo htmlspecialchars($message); ?></p>
                        </div>
                    <?php endif; ?>
                    <form class="register-form" action="register.php" method="POST">
                        <h2>Vehicle Owner Register Account</h2>
                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="number" name="age" placeholder="Age" required>
                        <input type="text" name="phone" placeholder="Phone Number" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="text" name="vehicle_number" placeholder="Vehicle Number" required>
                        <input type="text" name="vehicle_model" placeholder="Vehicle Model" required>
                        <input type="text" name="vehicle_category" placeholder="Vehicle Category" required>
                        <select name="city" required>
                            <option value="colombo">Colombo</option>
                            <option value="kandy">Kandy</option>
                            <option value="Kurunegala">Kurunegala</option>
                            <option value="Badulla">Badulla</option>
                            <option value="Galle">Galle</option>
                            <option value="Rathnapura">Rathnapura</option>
                            <option value="Matara">Matara</option>
                            <option value="Monaragala">Monaragala</option>
                        </select>
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