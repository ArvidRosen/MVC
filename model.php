<?php
require_once("sql.php");/* Retrieves the code in sql.php and uses it */
class User {/* Creates a class named User */
    protected $newUser, $newPass, $newPassverify;/* 3 new protected variables */
    function __construct($user, $pass, $passverify = null) {/* A constructor function with user, pass, passverify in paramters with passverify starting with the value null, then proceed to give the variables user, pass, passverify new names in order to use them in the class  */
        $this->newUser = $user; 
        $this->newPass = $pass;/* Makes new names for the variables in order to give them new values */
        $this->newPassverify = $passverify;
    }
    public function login() {/* Creates a static function named login with user, pass as parameters */
        if(isset($this->newUser)) {/* Checks if user parameter is set */
            $salt = '$6$rounds=5000$mvcproject$';/* Creates a salt for crypt */
            $data = sql("SELECT * FROM users WHERE user = :user AND pass = :pass;", [/* Inquires the database to find user with matching user and the hashed pass  */
                ":user" => $this->newUser,
                ":pass" => trim(crypt($this->newPass, $salt), $salt)
            ]);
            if(isset($data[0])) { // checks if user is set in db
                if($data[0]["user"] == $this->newUser) { // checks if assigned user from form is set in db
                    $_SESSION["user"] = $data[0]["user"]; /* If a matching user is found put the matching user key in SESSSION */
                } else {
                    header("Location: index.php?msg=".urlencode("Användarnamnet är inkorrekt.")); // if user comparison is incorrect then throw error.
                }
            } else {
                header("Location: index.php?msg=" . urlencode("Var god och försök igen."));/* If the matching user isn't found, redirect them to index.php with a error message */
            }
        }
    }

    public function register() {/* Creates a static function with user, pass, passverify as parameter */
        if(isset($this->newUser)) {/* Checks if user parameter is set */
            if(isset($this->newPass)) {/* Checks if pass parameter is set*/
                if($this->newPass == $this->newPassverify) {/* Checks if pass matches passverify */
                    $salt = '$6$rounds=5000$mvcproject$';/* creates salt for crypt */
                    $query = sql("INSERT INTO users(user, pass) Values('".$this->newUser."', '".trim(crypt($this->newPass, $salt), $salt)."')");/* Inserts a new user into the table with the provided user and hashed pass */
                    header("Location: index.php");
                } else {
                    header("Location: index.php?msg=".urlencode("Du kunde inte registrera dig, vänligen försök igen."));/* If pass does not match passverify redirects to index.php with a error message */
                }
            } 
        } 
    }
}
?>