<?php
include("connection.php");


$roomname = $_GET['roomname'];

$query ="SELECT * FROM rooms WHERE roomname  = '$roomname' ";

$result= mysqli_query($conn,$query);
if($result)
{
    if(mysqli_num_rows($result)<0)
    {
            $massage= "This Room is not Exist , kindky create a new Room !";

            echo '<script language="javascript">';
            echo 'alert(" '.$massage.' ");';
            echo 'window.location = "http://localhost/gulshanprojects/"; ';
            echo '</script>';
    }
}

else{
    echo "Error!".mysqli_error($conn);

}
?>

<!DOCTYPE html>
<html>
<head>
<!-- bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}

.scrollmsg{
    height:400px;
    overflow-y:strcoll;
}
</style>
</head>
<body background="background.jpg" >

<h2><font color="white"><b>Chat Messages for <?php echo $roomname?></b></font></h2>

<div class="container">
    <div class="scrollmsg">

</div>
</div>

<!-- second msg -->
<!-- 
<div class="container darker">
  <img src="logo.png" alt="Avatar" class="right" style="width:100%;">
  <p>Hey! I'm fine. Thanks for asking!</p>
  <span class="time-left">11:01</span> -->
</div>


<br>

<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Type the massages...">
<br>
<button class="btn btn-success" name="submitmsg" id="submitmsg">send</button>









<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

<script type=text/javascript>

// code for fetchig massages

setInterval(runFunction(),1000);
function runFunction(){
    $.post("fetchmsg.php",{room:'<?php echo $roomname ?>'},
    
    function(data,status){
        document.getElementsByClassName('scrollmsg')[0].innerHTML=data;
    }
    
    )
}


// end code for fetchig massages
 






// Get the input field
var input = document.getElementById("usermsg");

// Execute a function when the user presses a key on the keyboard
input.addEventListener("keypress", function(event) {
  // If the user presses the "Enter" key on the keyboard
  if (event.key === "Enter") {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("submitmsg").click();
  }
});


$("#submitmsg").click(function(){
    var clientmsg = $("#usermsg").val();
    $.post("postmsg.php",{text:clientmsg, room:'<?php echo $roomname?>', ip:'<?php echo $_SERVER['REMOTE_ADDR']?>'},
    function(data,status){
        document.getElementByClassName('scrollmsg')[0].innerHTML =data  ;
    });

$("#usermsg").val("");
return false; 
});
</script>
</body>
</html>
