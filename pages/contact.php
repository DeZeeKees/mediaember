<?php
require '../inc/functions.php';
html("../media/img/favicon.ico");
?>
<script src="../script/index.js" defer></script>
<link rel="stylesheet" href="../style/index.css">
</head>

<body id="indexBody">
    <?php
    navbar("../media/img/legitlogo.png", "login.php", "../index.php", "./private.php", "./logout.php", './public.php');
    ?>
    <div class="MasterDivCon">
        <div>
            <form action="./contact.php" method="post">
                <div class="card">
                    <h2>Contact Us</h4>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group mbox">
                                    <label>Message</label>
                                    <textarea></textarea required>
      </div>
    </div>

    <div class="col">
        <input type="submit" value="Submit" action="/beroeps projects/87426_BprjWEDE_CD_lj1p3/contact.php">
        <input type="reset" value="Reset">
    </div>
    </div>
    </div>
    </form>
    </div>
    <div class="info">
        <a href="../index.php">website</a><br><br>
        <a href="tel:06-24349694">tel: 06-24349694</a>
        <p>Location: Keizerin Marialaan</p>
        <p>Postcode: 25702 NR Helmond</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39744.603308290134!2d5.647186063994157!3d51.49417553241498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c723ddcd9a3de1%3A0x25a6423f29d6a26d!2sStichting%20Beheer%20Onderwijscentrum%20Keizerin%20Marialaan!5e0!3m2!1snl!2snl!4v1652866505447!5m2!1snl!2snl" width="150%" height="50%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>
    <?php
    footer("../media/img/toastersLogo.png", "contact.php", "about.php");
    ?>
</body>

</html>