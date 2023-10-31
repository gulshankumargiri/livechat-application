<?php

include("connection.php");
$room = $_POST['room'];

  if(strlen($room)>15 or strlen($room)<2)
{
  $msg= "please choose a Room Name between 2 to 15 characters";

  echo '<script language = "javascript">';

  echo 'alert(" '.$msg.' "); ';

  echo 'window.location = "http://localhost/gulshanprojects/"; ';

  echo '</script>';
}

$query = "SELECT * FROM rooms WHERE roomname = '$room' ";
$result = mysqli_query($conn,$query);

        if($result)
      {
          if(mysqli_num_rows($result)>0)
            {
            $msg= "Room already in Use!.Please choose another Room Name";

            echo '<script language="javascript">';
            echo 'alert(" '.$msg.' ");';
            echo 'window.location = "http://localhost/gulshanprojects/"; ';
            echo '</script>';

            } 
          else
        {
            $query = "INSERT INTO rooms(roomname,ctime) VALUES ('$room',CURRENT_TIMESTAMP)";


            if(mysqli_query($conn,$query)){

            $msg= "Your Room Is Ready For Chat!";

            echo '<script language="javascript">';
            echo 'alert("  '.$msg.'  ");';
            echo 'window.location = "http://localhost/gulshanprojects/rooms.php?roomname= '.$room.' "; ';
            echo '</script>';
            }
        }
      }
        else{
          echo "ERROR!".mysqli_error($conn);
        }
?>


