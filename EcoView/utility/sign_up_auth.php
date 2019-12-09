<?php

    if (isset($_POST['signup-submit']))
    {
        session_start();

        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password-confirm'];

        if (empty($email) || empty($username) || empty($password) || empty($password_confirm))
        {
            $_SESSION['error'] = "Empty fields";
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            header("Location: ../sign_up.php");
            exit();
        }
        else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
        {
            $_SESSION['error'] = "Invalid e-mail";
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            header("Location: ../sign_up.php");
            exit();
        }
        else if ($password != $password_confirm )
        {
            $_SESSION['error'] = "Password and confirm password does not match";
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $username;
            header("Location: ../sign_up.php");
            exit();
        }
        else
        {
            require("dbhandle.php");

            $query = "SELECT * FROM users WHERE username = ?";
            $statement = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($statement, $query))
            {
                $_SESSION['error'] = "Database error";
                header("Location: ../sign_up.php");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($statement, "s", $username);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);

                if(mysqli_stmt_num_rows($statement) > 0)
                {
                    $_SESSION['error'] = "Username is taken";
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username;
                    header("Location: ../sign_up.php");
                    exit();
                }
            }

            $query = "SELECT * FROM users WHERE email = ?";
            $statement = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($statement, $query))
            {
                $_SESSION['error'] = "Database error";
                header("Location: ../sign_up.php");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($statement, "s", $email);
                mysqli_stmt_execute($statement);
                mysqli_stmt_store_result($statement);

                if(mysqli_stmt_num_rows($statement) > 0)
                {
                    $_SESSION['error'] = "E-mail already exists";
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username;
                    header("Location: ../sign_up.php");
                    exit();
                }
            }

            $query = "INSERT INTO users (username, email, password, registr_date) VALUES (?, ?, ?, sysdate())";
            $statement = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($statement, $query))
            {
                $_SESSION['error'] = "Database error";
                header("Location: ../sign_up.php");
                exit();
            }
            else
            {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($statement, "sss", $username, $email, $password_hash);
                if (mysqli_stmt_execute($statement))
                {
                    // jesli weszlo tutaj to rejestracja sie powiodla
                    header("Location: ../log_in.php");
                    exit();
                }
            }

            header("Location: ../index.php");
            exit();
        }
        mysqli_stmt_close($statement);
        mysqli_close($connection);
    }
    else
    {
        header("Location: ../sign_up.php");
        exit();
    }

?>