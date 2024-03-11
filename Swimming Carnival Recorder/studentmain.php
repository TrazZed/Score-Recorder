<?php
    include "dbcon.php";
    $cookiename = "login";
    $cookievalue = $_SESSION['login'];
    setcookie($cookiename, $cookievalue, time() + 3600);
    $_COOKIE['login'] = $cookievalue;
    echo $_COOKIE['login'];
?>
<html>
    <head>
        <title>Student Scores</title>
    </head>
    <link rel="stylesheet" href="style.css">
    <script>
    </script>
    <body>
        <img src="mssclogo.jpg" align="right"><img src="qldgov.jpg" height="183px" width="140px" align="left">
        <h1 class="head1" align="center">Student's Scores</h1>
        <form action="" method="post">
            <table align="center" class="display">
                <tr>
                    <th class="bluetable">Event</th>
                    <th class="bluetable">Position</th>
                    <th class="bluetable">Points</th>
                </tr>
                <?php
                    $sql = "
                    SELECT *
                    FROM raceresults
                    WHERE EQID IN (  SELECT EQID 
                                    FROM people
                                    WHERE username = '". $_COOKIE["login"] ."');";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>". $row['Age'] ."  ". $row['Gender'] . "  " . $row['Distance'] ."  ". $row['Style'] ."</td><td>". $row['Position'] ."</td><td>". $row['Points'] ."</td></tr>";
                }
                ?>
                
            </table>
        </form>
        <form align="center" action="studentsearch.php">
                <input type="submit" class="longbut" value="Search Student House">
        </form>
        <form align="center" action="housepointsstudent.php">
                <input type="submit" class="longbut" value="View House Points">
        </form>
    </body>
</html>