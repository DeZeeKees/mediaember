<?php
require '../inc/functions.php';
html("../media/img/favicon.ico");
loginForm();
?>
<title>Media Ember - Login</title>
<script src="../script/index.js" defer></script>
<script src="../inc/jquery-3.6.0.js"></script>
<link rel="stylesheet" href="../style/logreg.css">
</head>
<script>
$(document).ready(function(){
    if(window.location.href.indexOf('loginFail') > -1) {
        registerFail.fire({
            title: 'Email or Password incorrect'
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed === true) {
                window.location.href = 'login.php'
            }
        })
    }    

    if(window.location.href.indexOf('loginSucces') > -1) {
        Swal.fire({
            icon: 'success',
            title: 'Logged In Successfully',     
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed === true) {
                window.location.href = 'private.php'
            }
        })
    }

    if(window.location.href.indexOf('connFail') > -1) {
        registerFail.fire({
            html: "<div>OWO Somethwing gwhent wong :( <br> A connection to the server could not be made</div>"
        }).then((result) => {
            if (result.isConfirmed || result.isDismissed === true) {
                window.location.href = 'login.php'
            }
        })
    }
})
</script>
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