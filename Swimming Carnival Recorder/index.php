<?php
    include "dbcon.php";
?>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <link rel="stylesheet" href="style.css">
    <body>
    <img src="mssclogo.jpg" align="right"><img src="qldgov.jpg" height="183px" width="140px" align="left">
        <h1 class="head1" align="center">Swimming Carnival Recorder</h1>
        <form align="center" action="" method="post">
            Username:<input type="text" class="textbox" name="User" required><br><br>
            Password:<input type="password" class="textbox" name="Pass" required><br><br>
            <input type="submit" class="longbut" value="Log In" name="login">
        </form>
        <?php
         if(isset($_POST['login'])) {
             $sql = "SELECT password FROM people WHERE username ='". $_POST['User'] ."';";
             $result = mysqli_query($conn, $sql);
             while ($row = mysqli_fetch_assoc($result)) {
                $password = $row['password'];
            }
             if($password !== $_POST['Pass']) {
                 echo "Incorrect Username or Password";
                 die;
             }
             $_SESSION['login'] = $_POST['User'];
             $sql = "SELECT identity FROM people WHERE username ='". $_POST['User'] ."';";
             $result = mysqli_query($conn, $sql);
             while ($row = mysqli_fetch_assoc($result)) {
                $identity = $row['identity'];
            }
            if($identity === "Student") {
                header("Location: studentmain.php");
                die;
            }
            if($identity === "Teacher") {
                header("Location: teachermain.php");
                die;
            }
            if($identity === "Announcer") {
                header("Location: houseage.php");
                die;
            }
         }
        ?>
    </body>
</html>