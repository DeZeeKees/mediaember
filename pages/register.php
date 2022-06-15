<?php
require '../inc/functions.php';
html("../media/img/favicon.ico");
registerForm();
?>
<title>Media Ember - Register</title>
<script src="../script/index.js" defer></script>
<script src="../inc/jquery-3.6.0.js"></script>
<link rel="stylesheet" href="../style/logreg.css">
<script>
    // #region Errors
$(document).ready(function(){
    if(window.location.href.indexOf('emailInUse') > -1) {
        registerFail.fire({
            text: 'Email already exist, please choose a different email'
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed === true) {
                window.location.href = 'register.php'
            }
        })
    }
    
    if(window.location.href.indexOf('usernameInUse') > -1) {
        registerFail.fire({
            text: 'Username already exist, please choose a different username'
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed === true) {
                window.location.href = 'register.php'
            }
        })
    }

    if(window.location.href.indexOf('regFail') > -1) {
        registerFail.fire({
            text: 'OWO Somethwing gwhent wong'
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed === true) {
                window.location.href = 'register.php'
            }
        })
    }

    if(window.location.href.indexOf('regSuccess') > -1) {
        Swal.fire({
            icon: 'success',
            title: 'Registered Successfully',     
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed === true) {
                window.location.href = 'login.php'
            }
        })
    }

    if(window.location.href.indexOf('connFail') > -1) {
        registerFail.fire({
            html: "<div>OWO Somethwing gwhent wong :( <br> A connection to the server could not be made</div>"
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed === true) {
                window.location.href = 'register.php'
            }
        })
    }

    if(window.location.href.indexOf('passMatch') > -1) {
        registerFail.fire({
            title: 'Passwords do not match'
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed === true) {
                window.location.href = 'register.php'
            }
        })
    }
})
// #endregion
</script>
</head>

<body>
    <button class="returnHome" onclick="window.location.href = '../index.php'">Back</button>
    <div class="registerContainer">
        <form action="" method="post" class="register-form">
            <h1 class="googlefont logRegTitle">Register A New Account</h1>
            <input class="logRegInputs googlefont" id="registerUsername" type="text" pattern="^[a-zA-Z0-9]+$" name="usernameRegister" value='<?php echo $username; ?>' placeholder="Username" required>
            <input class="logRegInputs googlefont" id="registerEmail" type="email" pattern="^[a-zA-Z0-9]+$" name="emailRegister" value='<?php echo $email; ?>' placeholder="your-email@email.com" required>
            <input class="logRegInputs googlefont passwordRequired1" type="password" name="passwordRegister" placeholder="Password" required>
            <input class="logRegInputs googlefont passwordRequired2" type="password" name="cPasswordRegister" placeholder="Confirm Password" required>
            <button class="logRegButton btnRegister googlefont" name="submit">Register</button>
            <p class="p">Have an account? <a class="LinkColor" href="./login.php">Login Here</a></p>
        </form>
    </div>
</body>
<!-- djsalkdsadkasjdlka -->
</html>