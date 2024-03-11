<?php
    include "dbcon.php";
?>
<html>
    <head>
        <title>Search Student House</title>
    </head>
    <link rel="stylesheet" href="style.css">
    <body>
    <img src="mssclogo.jpg" align="right"><img src="qldgov.jpg" height="183px" width="140px" align="left">
        <h1 class="head1" align="center">Search Student House</h1>
        <form align="center" action="" method="post">
            Student First Name:<br><input type="text" class="textbox" name="firstn" required><br><br>
            Student Last Name:<br><input type="text" class="textbox" name="lastn" required><br><br>
            <input type="submit" class="longbut" value="Search For Student House" name="search">
        </form>
        <?php
            if(isset($_POST['search'])) {
                $sql = "SELECT house FROM people WHERE firstname='". $_POST['firstn'] ."' AND surname='". $_POST['lastn'] ."';";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $house = $row['house'];
                }
                if ($house === "Doherty") {
                    echo "<table align='center'><tr><td class='doherty'>". $_POST['firstn'] ." ". $_POST['lastn'] ."</td><td class='doherty'>Doherty</td></tr></table>";
                }
                else if ($house === "Blackburn") {
                    echo "<table align='center'><tr><td class='blackburn'>". $_POST['firstn'] ." ". $_POST['lastn'] ."</td><td class='blackburn'>Blackburn</td></tr></table>";
                }
                else if ($house === "Bragg") {
                    echo "<table align='center'><tr><td class='bragg'>". $_POST['firstn'] ." ". $_POST['lastn'] ."</td><td class='bragg'>Bragg</td></tr></table>";
                }
                else if ($house === "Burnet") {
                    echo "<table align='center'><tr><td class='burnet'>". $_POST['firstn'] ." ". $_POST['lastn'] ."</td><td class='burnet'>Burnet</td></tr></table>";
                }
            }
        ?>
    </body>
    <head>
</html>