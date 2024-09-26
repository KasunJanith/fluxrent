<div class="logo">
    <img src="assets/img/logo.jpg" alt="Logo">
    <p>Car Renting Service</p>
</div>

<div class="login-search">
    <button id="loginButton">Login</button>
    <i class='bx bx-search' id="search-icon"></i>
    <div class="search-box">
        <input type="search" name="" id="" placeholder="Search here...">
    </div>
</div>

<div class="register-section" id="sign">
    <h1>REGISTER NOW</h1>
    <div class="register-cards">
        <div class="card">
            <img src="img/man.png" alt="Customer">
            <h2>Customer</h2>
            <button> <a href ='user/add_user.php'>Sign Up</a></button>
            <button onclick="location.href='login.php'">Login</button>
        </div>
        <div class="card">
            <img src="img/agent.png" alt="Vehicle Owner">
            <h2>Vehicle Owner</h2>
            <button onclick="location.href='vehicle_owner/add_vo.php'">Sign Up</button>
            <button onclick="location.href='login.php'">Login</button>
        </div>
        <div class="card">
            <img src="img/driver.png" alt="Driver">
            <h2>Driver</h2>
            <button onclick="location.href='driver/add_driver.php'">Sign Up</button>
            <button onclick="location.href='login.php'">Login</button>
        </div>
    </div>
</div>

<?php
echo "hello";
?>
