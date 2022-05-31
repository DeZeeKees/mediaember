<?php
require '../inc/functions.php';
html();
loginForm();
?>
<script src="../script/index.js" defer></script>
<link rel="stylesheet" href="../style/logreg.css">
</head>

<body>
    <button class="returnHome" onclick="window.location.href = '../index.php'">Back</button>
    <div class="loginContainer">
        <form action="" method="post" class="login-form">
            <h1 class="googlefont logRegTitle">Log In To Your Account</h1>
            <input class="logRegInputs googlefont" type="email" name="emailLogin" placeholder="your-email@email.com" required>
            <input class="logRegInputs googlefont" type="password" name="passwordLogin" placeholder="Password" required>
            <button class="logRegButton btnLogin googlefont" name="submit">Login</button>
            <p class="p">Dont have an account? <a class="LinkColor" href="register.php">Register Here</a></p>
        </form>
    </div>
</body>

</html>