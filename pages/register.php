<?php
require '../inc/functions.php';
html();
registerForm();
?>
<script src="../script/index.js" defer></script>
<link rel="stylesheet" href="../style/logreg.css">
</head>

<body>
    <button class="returnHome" onclick="window.location.href = '../index.php'">Back</button>
    <div class="registerContainer">
        <form action="" method="post" class="register-form">
            <h1 class="googlefont logRegTitle">Register A New Account</h1>
            <input class="logRegInputs googlefont" type="text" name="usernameRegister" value='<?php echo $username; ?>' placeholder="Username" required>
            <input class="logRegInputs googlefont" type="email" name="emailRegister" value='<?php echo $email; ?>' placeholder="your-email@email.com" required>
            <input class="logRegInputs googlefont" type="password" name="passwordRegister passwordRequired1" placeholder="Password" required>
            <input class="logRegInputs googlefont" type="password" name="cPasswordRegister passwordRequired2" placeholder="Confirm Password" required>
            <button class="logRegButton btnRegister googlefont" name="submit">Register</button>
            <p class="p">Have an account? <a class="LinkColor" href="./login.php">Login Here</a></p>
        </form>
    </div>
</body>

</html>