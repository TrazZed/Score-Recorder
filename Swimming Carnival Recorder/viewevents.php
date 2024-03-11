<?php
    include "dbcon.php";
?>
<html>
    <head>
        <title></title>
    </head>
    <link rel="stylesheet" href="style.css">
    <script>
    </script>
    <body>
        <img src="mssclogo.jpg" align="right"><img src="qldgov.jpg" height="183px" width="140px" align="left">
        <h1 class="head1" align="center">View Event</h1>
        <form align="center" action="" method="post">
            Age:<br>
            <select name="age">
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>Opens</option>
            </select><br>
            Distance:<br>
            <select name="distance">
                <option>50m</option>
            </select><br>
            Gender:<br>
            <select name="gender">
                <option>Male</option>
                <option>Female</option>
            </select><br>
            Style:<br>
            <select name="style">
                <option>Freestyle</option>
                <option>Backstroke</option>
                <option>Breaststroke</option>
                <option>Butterfly</option>
            </select><br><br>
            <input type="submit" class="longbut" name="viewnew" value="View Event">
        </form>
        <?php
            if(isset($_POST['viewnew'])) {
                $sql = "SELECT * FROM raceresults AS r, people AS p WHERE r.distance='". $_POST['distance'] ."' AND r.style='". $_POST['style'] ."' AND r.age='". $_POST['age'] ."' AND r.gender='". $_POST['gender'] ."' AND p.EQID = r.EQID GROUP BY r.position ORDER BY r.position ASC;";
                $result = mysqli_query($conn, $sql);
                echo "<table align='center' class='display'><tr><th>Position</th><th>Student</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td class='". $row['House'] ."'>". $row['Position'] ."</td><td class='". $row['House'] ."'>". $row['Firstname'] ." ". $row['Surname'] ."</td></tr>";
                }
            }
        ?>
    </body>
</html>