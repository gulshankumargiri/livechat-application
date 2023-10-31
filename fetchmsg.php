<?php
include("connection.php");
$room1 = $_POST['room'];

$query = "SELECT msg, ctime, ip FROM msgs WHERE room = '$room1'";

$res = "";

$result1 = mysqli_query($conn, $query);

if (mysqli_num_rows($result1) > 0) {
    while ($row = mysqli_fetch_assoc($result1)) {
        $res = $res . '<div class="container">';
        $res = $res . $row['ip'];

        $res = $res . " says <p> " . $row['msg'];

        $res = $res . '</p> <span class="time-right">' . $row["ctime"] . '</span></div>';
    }
}
echo $res;
?>
