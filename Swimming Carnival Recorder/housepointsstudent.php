<?php
    include "dbcon.php";
?>
<html>
    <head>
        <title>House Points</title>
    </head>
    <link rel="stylesheet" href="style.css">
    <body>
    <img src="mssclogo.jpg" align="right"><img src="qldgov.jpg" height="183px" width="140px" align="left">
        <h1 class="head1" align="center">House Points</h1>
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
    </body>
</html>