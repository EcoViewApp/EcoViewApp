<?php

    if (isset($_POST['login-submit']))
    {
        session_start();

        $email_username = $_POST['email-username'];
        $password = $_POST['password'];

        if (empty($email_username) || empty($password))
        {
            $_SESSION['error'] = "Empty fields";
            $_SESSION['email-username'] = $email_username;
            header("Location: ../log_in.php");
            exit();
        }
        else
        {
            require("dbhandle.php");

            $query = "SELECT * FROM users WHERE username = ? OR email = ?";
            $statement = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($statement, $query))
            {
                $_SESSION['error'] = "Database error";
                header("Location: ../log_in.php");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($statement, "ss", $email_username, $email_username);
                mysqli_stmt_execute($statement);
                $result = mysqli_stmt_get_result($statement);

                if ($row = mysqli_fetch_assoc($result))
                {
                    $password_check = password_verify($password, $row['password']);

                    if(!$password_check)
                    {
                        $_SESSION['error'] = "No matching account";
                        $_SESSION['email-username'] = $email_username;
                        header("Location: ../log_in.php");
                        exit();
                    }

                    // jesli weszlo tu to logowanie sie udalo
                    session_start();
                    $_SESSION['user'] = $row['email'];

                    header("Location: ../index.php");
                    exit();
                    
                }
                else
                {
                    $_SESSION['error'] = "No matching account";
                    $_SESSION['email-username'] = $email_username;
                    header("Location: ../log_in.php");
                    exit();
                }
            }
        }
    }
    else
    {
        header("Location: ../log_in.php");
        exit();
    }

?>