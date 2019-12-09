<?php
    require('header.php');
?>


    <div class="right">
        <h3>Sign Up</h3>
        <?php 
            if (isset($_GET['err']))
            {
                $error = $_GET['err'];

                switch ($error)
                {
                    case 'emptyfield':
                        echo "<p>Empty fields</p>";
                        break;
                    case 'diffpasswords':
                        echo "<p>Passwords do not match</p>";
                        break;
                    case 'usernametaken':
                        echo "<p>Username is taken</p>";
                        break;
                    case 'emailexist':
                        echo "<p>E-mail already exists</p>";
                        break;
                }
            } 
        ?>
        <form action="utility/sign_up_auth.php" method="post">
            <input type="text" name="email" placeholder="E-mail"><br>
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="password" name="password-repeat" placeholder="Repeat password"><br>
            <br><button type="submit" name="signup-submit">Sign Up</button>
        </form>
        </div>


<?php
    require('footer.php');
?>