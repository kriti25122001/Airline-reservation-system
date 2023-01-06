<?php
  session_start();
  if(($_SESSION["user"])==null){
    header("location: login.php");
  }

  $f=1;$fl=0;
  if( $_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';
    $from = $_POST["fcity"];
    $to=$_POST["tcity"]; 
    $class=$_POST["class"];
    $fdate=$_POST["fdate"];
    $tdate=$_POST["tdate"];

    if($class=="Economy"){
      $sql = "SELECT * FROM airline_sch WHERE orig='$from' AND dest='$to' AND DATE(dept) BETWEEN '$fdate' AND '$tdate';";
      $res = $conn->query($sql);
      /* if ($res){}
      else{
        echo("Error description: " . mysqli_error($conn));
      } 
      $f=1; */
      echo '<div class="result">
        <form method="POST" action="confirm_details.php">
          <table border=3 class="table table-bordered table-hover" align="center" style="font-size:15px; background-color: #FADCC8;height:50%;width:50%">
            <thead>
              <tr><th colspan="13"><h3>Airline Search Results from '.$_POST["fcity"].' to '.$_POST["tcity"] .' in '.$_POST["class"].':</h3></th></tr>
              <tr>
                  <th scope="col">Flight ID</th>
                  <th scope="col">Fare</th>
                  <th scope="col">Departure</th>
                  <th scope="col">Origin</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Arrival</th>
                  <th scope="col"></th>
              </tr>
           </thead>' ;
      while($rows=mysqli_fetch_assoc($res)){
        echo "<form method='POST' action='confirm_details.php'>
          <input type='hidden' name='class' value=$class />
          <input type='hidden' name='flight' value='{$rows['flight_id']}' />
          <input type='hidden' name='origin' value='{$rows['orig']}' />
          <input type='hidden' name='departure' value='{$rows['dept']}' />
          <input type='hidden' name='destination' value='{$rows['dest']}' />
          <input type='hidden' name='arrival' value='{$rows['arriv']}' />
          <input type='hidden' name='cost' value='{$rows['fare_ec']}' />
            <td>{$rows['flight_id']}</td>
            <td>{$rows['fare_ec']}</td> 
            <td>{$rows['dept']}</td>
            <td>{$rows['orig']}</td>
            <td>{$rows['dest']}</td>
            <td>{$rows['arriv']}</td>
            <td><input type='submit'name='submit' value='BOOK NOW!'/></td><tr>
          </form>";
      }
      echo '</table></form></div>';
    }
      
    else if($class=="Business"){
      $sql = "SELECT * FROM airline_sch WHERE orig='$from' AND dest='$to' AND DATE(dept) BETWEEN '$fdate' AND '$tdate';";
      $res = $conn->query($sql);
      /* if ($res){}
      else{
        echo("Error description: " . mysqli_error($conn));
      } 
      $f=1; */
      echo '<div class="result">
        <form method="POST" action="confirm_details.php">
          <table border=3 class="table table-bordered table-hover" align="center" style="font-size:15px; background-color: #FADCC8;height:100%;width:100%">
            <thead>
              <tr><th colspan="13"><h3>Airline Search Results from '.$_POST["fcity"].' to '.$_POST["tcity"] .' in '.$_POST["class"].':</h3></th></tr>
              <tr>
                  <th scope="col">Flight ID</th>
                  <th scope="col">Fare</th>
                  <th scope="col">Departure</th>
                  <th scope="col">Origin</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Arrival</th>
                  <th scope="col"></th>
              </tr>
           </thead>' ;
      while($rows=mysqli_fetch_assoc($res)){
        echo "<form method='POST' action='confirm_details.php'>
        <input type='hidden' name='class' value=$class />
        <input type='hidden' name='flight' value='{$rows['flight_id']}' />
        <input type='hidden' name='origin' value='{$rows['orig']}' />
        <input type='hidden' name='departure' value='{$rows['dept']}' />
        <input type='hidden' name='destination' value='{$rows['dest']}' />
        <input type='hidden' name='arrival' value='{$rows['arriv']}' />
        <input type='hidden' name='cost' value='{$rows['fare_buis']}' />
            <td>{$rows['flight_id']}</td>
            <td>{$rows['fare_buis']}</td> 
            <td>{$rows['dept']}</td>
            <td>{$rows['orig']}</td>
            <td>{$rows['dest']}</td>
            <td>{$rows['arriv']}</td>
            <td><input type='submit'name='submit' value='BOOK NOW!'/></td><tr>
          </form>";
      }
      echo '</table></form></div>';
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Flights</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  body {
        font-family: "Lato", sans-serif;
        background-image: url("https://www.thephotoforum.com/attachments/thousand_steps3-jpg.95195/");
        background-repeat: no-repeat;
        background-size: cover;
      }
  .result{
    position: absolute;
    top: 80%;
    height:100%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
  }
  .main {
    margin-left: 10px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  html, body {
        min-height: 100%;
        }
  input[type=button], input[type=submit], input[type=reset] {
    background-color: #4f86f9;
    -webkit-border-radius: 60px;
    border-radius: 60px;
    border: none;
    color: #eeeeee;
    cursor: pointer;
    display: inline-block;
    font-family: sans-serif;
    font-size: 20px;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
  }
  @keyframes glowing {
    0% {
      background-color: #2ba805;
      box-shadow: 0 0 3px #2ba805;
    }
    50% {
      background-color: #49e819;
      box-shadow: 0 0 10px #49e819;
    }
    100% {
      background-color: #2ba805;
      box-shadow: 0 0 3px #2ba805;
    }
  }
  input[type=button], input[type=submit]{
          animation: glowing 1300ms infinite;
  }
      .sidenav {
        height: 100%;
        width: 160px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-top: 20px;
      }
      .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
      }
      .sidenav a:hover {
        color: #f1f1f1;
      }
      @media screen and (max-height: 450px) {
        .sidenav {
          padding-top: 15px;
        }
        .sidenav a {
          font-size: 18px;
        }
      }
      html, body {
        min-height: 100%;
      }
      .sidenav {
        height: 100%;
        width: 160px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: transparent;
        overflow-x: hidden;
        padding-top: 20px;
      }
      .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: BLACK;
        display: block;
      }
      .sidenav a:hover {
        color: #f1f1f1;
      }
      h1 {
        position: absolute;
        margin: 0;
        line-height: 55px;
        font-size: 55px;
        color: #fff;
        z-index: 2;
      }
      #side a, .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        display: block;
        border: none;
        background: #6b4724;
        width: 100%;
        text-align: left;
        cursor: pointer;
        outline: none;
      }
      #side a:hover, .dropdown-btn:hover {
        color: yellow;
      }
      .sticky {
        position: fixed;
        top: 0;
        width: 100%;
      }
      .sticky + .content {
        padding-top: 60px;
      }
      #menu{
        width:50px;
        position: fixed;
        right: 65px;
        top:35px;
        z-index:2;
        cursor:pointer;
      }
      #side{
        width:250px;
        height:700px;
        position: fixed;
        right:-250px;
        top:0;
        background-color:rgba(0,0,0,0.2);
        z-index: 2;
        transition: 2s;
        overflow-y: scroll;
      }
      li {
        list-style-type: none;
        font-size: 16pt;
      }
      nav ul li{
        list-style: none;
        margin:50px 20px;
      }
      nav ul li a{
        text-transform: uppercase;
        text-decoration: none;
        color: white;
        text-align: right;
      }
      #navbar{
        background-color:rgba(0,0,0,0.2);
      }
  </style>
</head>
<body>
<div id="navbar">
		<div class="container">
			<img src="https://5.imimg.com/data5/TK/AD/MY-36130657/flight-booking-500x500.png" class="img-fluid" width="171.2" height="100" style="float:left">
			<ul class="nav navbar-nav navbar-right">
      <li style="top: 24px;"><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp; <?php print_r($_SESSION["user"]);?></a></li>
			</ul>
		</div>
	</div>
  <div class="main">
    <nav id="side">
      <ul>
        <br><br><br><br><br><br><br><br>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="searchflights.php">Book Ticket</a></li>
        <li><a href="enquiry.php">Enquiry</a></li>
        <li style="top: 24px;"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;logout</a></li>
      </ul>
    </nav>
    <script>
      var menu=document.getElementById("menu");
      var side=document.getElementById("side");
      side.style.right="-250px";
      menu.onclick=function(){
        if(side.style.right=="-250px"){
          side.style.right="0px"
        }
        else{
          side.style.right="-250px"
        }
      }
      var scroll = new SmoothScroll('a[href*="#"]');
      window.onscroll = function() {myFunction()};
      var navbar = document.getElementById("navbar");
      var sticky = navbar.offsetTop;
      function myFunction() {
        if (window.pageYOffset >= sticky) {
          navbar.classList.add("sticky")
        }
        else {
          navbar.classList.remove("sticky");
        }
      }
    </script>
</body>
</html>