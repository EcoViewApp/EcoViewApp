<?php

    if (isset($_POST['login-submit']))
    {
        $email_username = $_POST['email-username'];
        $password = $_POST['password'];

        if (empty($email_username) || empty($password))
        {
            header("Location: ../log_in.php?err=emptyfield");
            exit();
        }
        else
        {
            require("dbhandle.php");

            $query = "SELECT * FROM users WHERE username = ? OR email = ?";
            $statement = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($statement, $query))
            {
                header("Location: ../log_in.php?err=sqlerr");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($statement, "ss", $email_username, $email_username);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);

                if(mysqli_stmt_num_rows($statement) != 1)
                {
                    header("Location: ../log_in.php?err=nomatch");
                    exit();
                }
            }

            session_start();
            $_SESSION['user'] = $email_username;

            header("Location: ../index.php");
            exit();
        }
    }
    else
    {
        header("Location: ../log_in.php");
        exit();
    }

?>