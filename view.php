<?php

class View { /* create a class by the name View*/

    public static function form($acc) { /*defines a static method named form that atkes one parameter $acc */
        if($acc == "register") { /*checing if $acc is equal to register */
        ?>
            <form action="index.php" method="POST"> <!-- submits data to index.php using the post method  -->
                <input type="text" name="user" placeholder="username"><!--input file for user-->
                <input type="password" name="pass" placehoslder="password"><!--input fiele for pass-->
                <input type="password" name="passVerify" placeholder="password verify"><br><br><!-- input files for verify the password -->
                <input type="hidden" name="acc" value="<?php echo $_GET["acc"]; ?>"><!-- hiden input file to carry acc value from the fary sting -->
                <input type="submit" value="submit"><!-- submit button to be able to submit the form-->
            </form>
        <?php
        } else if ($acc == "login") { /*if acc selected*/
            ?>
            <form action="index.php" method="POST"> <!--submits data to index.php using post method-->
                <input type="text" name="user" placeholder="username"><!--input file for user-->
                <input type="password" name="pass" placeholder="password"><br><br><!--input fiele for pass-->
                <input type="hidden" name="acc" value="<?php echo $_GET["acc"]; ?>"><!-- input files for verify the password -->
                <input type="submit" value="submit"><!-- submit button to be able to submit the form-->
            </form>
            <?php
        }
    }
    public static function printInfo() {
        $salt = '$6$rounds=5000$mvcproject$'; /*format salt*/
        $query = sql("SELECT * FROM Users WHERE user = :user AND pass = :pass", [ /*select the data thats gonna be encypted*/
            ":user" => $_POST["user"], /*makes ":user" = the data proccessed*/
            ":pass" => trim(crypt($_POST["pass"], $salt), $salt) /*crypt the password using the salt format*/
        ]);
        echo "Username: ".$_POST["user"]."<br>";  /*prints the username*/
        ?>
        <a href="logout.php">Logga ut</a><br> <!--directs user to logout.php when pressed-->
        <?php
    }
}


?>