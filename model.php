<?php
require_once("sql.php");/* Retrieves the code in sql.php and uses it */
class User {/* Creates a class named User */

    public static function login($user, $pass) {/* Creates a static function named login with user, pass as parameters */
        if(isset($user)) {/* Checks if user parameter is set */
            $salt = '$6$rounds=5000$mvcproject$';/* Creates a salt for crypt */
            $data = sql("SELECT * FROM users WHERE user = :user AND pass = :pass;", [/* Inquires the database to find user with matching user and the hashed pass  */
                ":user" => $user,
                ":pass" => trim(crypt($pass, $salt), $salt)
            ]);

            if(isset($data[0])) {
                $_SESSION["user"] = $data[0]["user"]; /* If a matching user is found put the matching user key in SESSSION */
            } else {
                header("Location: index.php?msg=" . urlencode("Var god och försök igen."));/* If the matching user isn't found, redirect them to index.php with a error message */
            }
        }
    }

    public static function register($user, $pass, $passverify) {/* Creates a static function with user, pass, passverify as parameter */
        if(isset($user)) {/* Checks if user parameter is set */
            if(isset($pass)) {/* Checks if pass parameter is set*/
                if($pass == $passverify) {/* Checks if pass matches passverify */
                    $salt = '$6$rounds=5000$mvcproject$';/* creates salt for crypt */
                    $query = sql("INSERT INTO users(user, pass) Values('".$user."', '".trim(crypt($pass, $salt), $salt)."')");/* Inserts a new user into the table with the provided user and hashed pass */
                    header("Location: index.php?msg=".urlencode(trim(crypt($pass, $salt), $salt)));
                } else {/* Redirect to index.php with a success message or the hashed password */
                    header("Location: index.php?msg=".urlencode("Du kunde inte registrera dig, vänligen försök igen."));/* If pass does not match passverify redirects to index.php with a error message */
                }
            }
        }
    }
}

?>