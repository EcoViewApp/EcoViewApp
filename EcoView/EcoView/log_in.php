<?php
    require('header.php');
?>


    <div class="right">
        <h3>Log in</h3>
        <?php 
            if (isset($_GET['err']))
            {
                $error = $_GET['err'];

                switch ($error)
                {
                    case 'emptyfield':
                        echo "<p>Empty fields</p>";
                        break;
                    case 'nomatch':
                        echo "<p>E-mail or password incorrect</p>";
                        break;
                }
            } 
        ?>
       
        <form action="utility/log_in_auth.php" method="post">
            <input type="text" name="email-username" placeholder="E-mail / Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <br><button type="submit" name="login-submit">Log In</button>
        </form>
    </div>


<?php
    require('footer.php');
?>