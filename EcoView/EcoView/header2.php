<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Eco View</title>
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="index.php">
                    <img src="images/logo.png" alt="logo">
                </a>
            </nav>
            <div class="forms">
                <?php
                    if(isset($_SESSION['user']))
                    {
                        echo "<a class='btn' href='utility/log_out.php'>Log Out</a>";
                    }
                    else
                    {
                        echo "<a class='btn' href='log_in.php'>Log In</a>";
                        echo "<a class='btn' href='sign_up.php'>Sign Up</a>";
                    }
                ?>
            </div>
        </header>
        