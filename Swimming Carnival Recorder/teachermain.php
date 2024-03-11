<?php
    include "dbcon.php";
?>
<html>
    <head>
        <title>Administrator Page</title>
    </head>
    <link rel="stylesheet" href="style.css">
    <script>
    </script>
    <body>
    <img src="mssclogo.jpg" align="right"><img src="qldgov.jpg" height="183px" width="140px" align="left">
    <h1 class="head1" align="center">Swimming Carnival Recorder</h1>
    <form align="center" action="viewevents.php">
        <input type="submit" class="mainbut" value="View Events">
    </form>
    <form align="center" action="modifyscores.php">
        <input type="submit" class="mainbut" value="Input New Score">
    </form>
    <form align="center" action="housepointsteacher.php">
        <input type="submit" class="mainbut" value="View House Points">
    </form>
    </body>
</html>