<?php
    include "dbcon.php";
?>
<html>
    <head>
        <title>Announcer Page</title>
    </head>
    <link rel="stylesheet" href="style.css">
    <body>
    <img src="mssclogo.jpg" align="right"><img src="qldgov.jpg" height="183px" width="140px" align="left">
        <h1 class="head1" align="center">Announcer Page</h1>
        <form align="center" action="" method="post">
            <table class="housetable">
                <tr>
                    <th>House</th>
                    <th>Points</th>
                </tr>
                <?php
                    $sql = "SELECT House, SUM(points) FROM housepoints GROUP BY House ORDER BY SUM(points) DESC;";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td class='". $row['House'] ."'>". $row['House'] ."</td><td class='". $row['House'] ."'>". $row['SUM(points)'] ."</td></tr>";
                    }
                ?>
            </table>
        </form>
        <form align="left">
            <h1>Boys Age Champions</h1>
            <table>
                <tr>
                    <th>Age</th>
                    <th>Champions</th>
                </tr>
                <?php
                    for($x=0; $x<5; $x++) {
                        $age = 12 + $x;
                        $sql = "SELECT h.EQID, p.EQID, p.firstname, p.surname, p.age, p.house, MAX(h.points) FROM housepoints AS h, people AS p WHERE p.gender = 'male' AND h.EQID = p.EQID AND age='". $age ."';";
                        $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>". $row['age'] ."</td><td>". $row['firstname'] ." ". $row["lastname"] ."</td></tr>";
                        }
                    }
                    $sql = "SELECT h.EQID, p.EQID, p.firstname, p.surname, p.age, p.house, MAX(h.points) FROM housepoints AS h, people AS p WHERE p.gender = 'male' AND h.EQID = p.EQID AND age='Opens';";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>". $row['age'] ."</td><td>". $row['firstname'] ." ". $row["lastname"] ."</td></tr>";
                    }
                ?>
            </table> 
        </form>
        <form align="left">
            <h1>Girls Age Champions</h1>
            <table>
                <tr>
                    <th>Age</th>
                    <th>Champions</th>
                </tr>
                <?php
                    for($x=0; $x<5; $x++) {
                        $age = 12 + $x;
                        $sql = "SELECT h.EQID, p.EQID, p.firstname, p.surname, p.age, p.house, MAX(h.points) FROM housepoints AS h, people AS p WHERE p.gender = 'female' AND h.EQID = p.EQID AND age='". $age ."';";
                        $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>". $row['age'] ."</td><td>". $row['firstname'] ." ". $row["lastname"] ."</td></tr>";
                        }
                    }
                    $sql = "SELECT h.EQID, p.EQID, p.firstname, p.surname, p.age, p.house, MAX(h.points) FROM housepoints AS h, people AS p WHERE p.gender = 'female' AND h.EQID = p.EQID AND age='Opens';";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>". $row['age'] ."</td><td>". $row['firstname'] ." ". $row["lastname"] ."</td></tr>";
                    }
                ?>
            </table> 
        </form>
    </body>
</html>