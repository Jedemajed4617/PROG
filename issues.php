<?php

include('functions.php');
include('var_dump.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
$username = $_SESSION['username'];

$issues = GetAllIssues($mysqli);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./photo/StormLogo.png" type="image/x-icon">
    <script src="jquery-2.1.4.js"></script>
    <title>Storm Services</title>
</head>

<script type='text/javascript'>
    // Titel scroll animatie
    msg = document.title;
    msg = msg + "          ";
    position = 0;

    function scrolltitle() {
        document.title = msg.substring(position, msg.length) + msg.substring(0, position);
        position++;
        if (position > msg.length) position = 0
        window.setTimeout("scrolltitle()", 250);
    }
    scrolltitle();
</script>

<header>
    <div class="content typewriter noselect">
        <hgroup>
            <h1>Storm Services</h1>
            <p>
                <i>
                    For all your Fivem Unbans!
                </i>

            </p>
        </hgroup>
    </div>
</header>

<body class="pietje noselect">
    <section class="site">
        <nav>
            <a class="peetje13" href="index.php">Home</a>
            <a class="peetje13" href="about.php">About</a>
            <a class="peetje13" style="color: white;" href="shopcart.php">Cart</a>
            <a class="peetje13" href="issues.php">Issues</a>
            <?php
            if (!isset($_SESSION['username'])) {
                ?>
                <a class="peetje13" href="login.php">Login</a>
                <a class="peetje13" href="register.php">Register</a>
                <?php
            } else {
                ?>
                <a class="peetje13" href="logout.php">Logout</a>
                <a class="peetje13" href="dashboard.php">Profile</a>
                <?php
            }
            ?>
        </nav>
    </section>
    <br>
    <br>
    <br>
    <br>
    <center><a href="createissue.php" class="buy">Create issue</a></center>
    <section class="jeroen">
        
        <br>
        <br>
        <br>

        <?php
        while ($row = $issues->fetch_assoc()) {
        ?>  
        <article class="card kaartje1">
            
            <br>
            <div class="imgBox">
                <img src="./<?php echo $row['image']?>" alt="Storm Spoofer buy card" class="mouse">
            </div>

            <div class="contentBox">
                <h3><?php echo $row['title']?></h3>
                <h2 class="price"><?php if($row['solved'] == "1"){ echo "SOLVED";}else{ echo "OPEN";}?></h2>
                <div class="issuebuttons">
                <a href="issueinfo.php?item=<?php echo $row['id']?>" class="buy">Open</a>
                </div>
            </div>

        </article>

        <?php
        }
        ?>
    </section>

    <footer class="footer">
        <?php
            if (!isset($_SESSION['username'])) {
        ?>
            <ul class="footerNav">
                <li class="footerNavItem">
                    <a class="peetje13" href="index.php">Home</a>
                    <a class="peetje13" href="login.php">Login</a>
                    <a class="peetje13" href="register.php">Register</a>  
                </li>
            </ul>
            <ul class="openHours noselect">
                <li class="openHoursTime2">all rights reserved</li> <!-- miss voor later iets toevoegen -->
                <li class="openHoursTime2">Ⓒ 2022 - Storm Services</li>
            </ul>
        <?php
            } else {
        ?>  
            <ul class="footerNav">
                <li class="footerNavItem">
                    <a class="peetje13" href="issues.php">Issues</a>
                    <a class="peetje13" href="logout.php">Logout</a>
                    <a class="peetje13" href="dashboard.php">Profile</a>
                </li>
            </ul>
            <ul class="openHours noselect">
                <li class="openHoursTime2">all rights reserved</li> <!-- miss voor later iets toevoegen -->
                <li class="openHoursTime2">Ⓒ 2022 - Storm Services</li>
            </ul>   
        <?php }?>
    </footer>
</body>

</html>