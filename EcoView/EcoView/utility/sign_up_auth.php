<?php

    if (isset($_POST['signup-submit']))
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_repeat = $_POST['password-repeat'];

        if (empty($email) || empty($username) || empty($password) || empty($password_repeat))
        {
            header("Location: ../sign_up.php?err=emptyfield");
            exit();
        }
        else if ($password != $password_repeat )
        {
            header("Location: ../sign_up.php?err=diffpasswords");
            exit();
        }
        else
        {
            require("dbhandle.php");

            $query = "SELECT * FROM users WHERE username = ?";
            $statement = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($statement, $query))
            {
                header("Location: ../sign_up.php?err=sqlerr");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($statement, "s", $username);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);

                if(mysqli_stmt_num_rows($statement) > 0)
                {
                    header("Location: ../sign_up.php?err=usernametaken");
                    exit();
                }
            }

            $query = "SELECT * FROM users WHERE email = ?";
            $statement = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($statement, $query))
            {
                header("Location: ../sign_up.php?err=sqlerr");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($statement, "s", $email);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);

                if(mysqli_stmt_num_rows($statement) > 0)
                {
                    header("Location: ../sign_up.php?err=emailexist");
                    exit();
                }
            }

            $query = "INSERT INTO users (username, email, password, registr_date) VALUES (?, ?, ?, sysdate())";
            $statement = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($statement, $query))
            {
                header("Location: ../sign_up.php?err=sqlerr");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($statement, "sss", $username, $email, $password);
                if (mysqli_stmt_execute($statement))
                {
                    header("Location: ../log_in.php");
                    exit();
                }
            }

            header("Location: ../index.php");
            exit();
        }
    }
    else
    {
        header("Location: ../sign_up.php");
        exit();
    }

?>