<?php
    require('header.php');
?>


    <div class="right">
        <h3>Sign Up</h3>
        <?php 
            if (isset($_SESSION['error']))
            {
                $error = $_SESSION['error'];
                unset($_SESSION['error']);
                echo "<p>$error</p>";
            } 
        ?>
        <form action="utility/sign_up_auth.php" method="post">
            <?php 
                if(isset($_SESSION['email'])) {
                    $email = $_SESSION['email'];
                    echo "<input type='text' name='email' value='$email'><br>"; 
                    unset($_SESSION['email']);
                }
                else {
                    echo "<input type='text' name='email' placeholder='E-mail'><br>"; 
                }

                if(isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo "<input type='text' name='username' value='$username'><br>"; 
                    unset($_SESSION['username']);
                }
                else {
                    echo "<input type='text' name='username' placeholder='Username'><br>"; 
                }
            ?>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="password" name="password-confirm" placeholder="Confirm password"><br>
            <br><button type="submit" name="signup-submit">Sign Up</button>
        </form>
        </div>


<?php
    require('footer.php');
?>