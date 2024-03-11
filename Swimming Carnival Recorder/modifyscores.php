<?php
    include "dbcon.php";
?>
<html>
    <head>
        <title>Input Score</title>
    </head>
    <link rel="stylesheet" href="style.css">
    <script>
    </script>
    <body>
        <img src="mssclogo.jpg" align="right"><img src="qldgov.jpg" height="183px" width="140px" align="left">
        <h1 class="head1" align="center">Input New Event Score</h1>
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
            </select><br>
            Student First Name:<br>
            <input type="text" name="firstname" required><br>
            Student Last Name:<br>
            <input type="text" name="lastname" required><br>
            Position:<br>
            <input type="number" name="position" required><br><br>
            <input type="submit" class="longbut" name="inputscore" value="Input New Student Result">
        </form>
        <?php
            if(isset($_POST['inputscore'])) {
                $score = 11 - $_POST['position'];
                $sql = "SELECT eqid, house FROM people WHERE firstname='". $_POST['firstname'] ."' AND surname='". $_POST['lastname'] ."';";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $EQID = $row['eqid'];
                    $house = $row['house'];
                }
                $sql ="INSERT INTO raceresults VALUES ('". $EQID ."', '". $_POST['distance'] ."', '". $_POST['style'] ."', '". $_POST['age'] ."', '". $_POST['gender'] ."', '". $_POST['position'] ."', '". $score ."');";
                $result = mysqli_query($conn, $sql);

                $sql = "SELECT * FROM housepoints WHERE EQID='". $EQID ."';";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $key = $row['EQID'];
                }
                if ($key === NULL) {
                    $sql = "INSERT INTO housepoints VALUES ('". $EQID ."', '". $house ."', '". $score ."')";
                    $result = mysqli_query($conn, $sql);
                    echo "New Student Added Successfully";
                }
                else {
                    $sql = "SELECT points FROM housepoints WHERE EQID='". $EQID ."';";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $current = $row['points'];
                    }
                    $new = $score + $current;
                    $sql = "UPDATE housepoints SET points='". $new . "' WHERE EQID='". $EQID ."';";
                    $result = mysqli_query($conn, $sql);
                    echo "Student Score Updated Successfully";
                }
            }
        ?>
    </body>
</html>