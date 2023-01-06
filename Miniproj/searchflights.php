<?php 
  session_start();
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
    <link href="searchflights.css" rel="stylesheet">
    <style>
      body {
        font-family: "Lato", sans-serif;
        background-image: url("images/search.png");
        background-repeat: no-repeat;
        background-size: cover;
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
    <div class="testbox">
      <form action="search_result.php" method="post">
      <div class="item">
          <h2 style="text-align: center;">Filter Flights</h2>
          <label for="fcity">FROM:</label>
          <select name="fcity" id="fcity"  class="form-control">
            <option value="hyderabad">Hyderabad</option>
            <option value="delhi">Delhi </option>
            <option value="shimla">Shimla</option>
            <option value="chennai">Chennai</option>
            <option value="lucknow">Lucknow </option>
            <option value="prayagraj">Prayagraj</option>
            <option value="bengaluru">Bengaluru</option>
            <option value="mumbai">Mumbai</option>
            <option value="kochi">Kochi</option>
            <option value="kolkata">Kolkata </option>
            <option value="jaipur">Jaipur</option>
            <option value="surat">Surat</option>
          </select>
        </div>
        <div class="item">
          <label for="tcity">TO:</label>
          <select name="tcity" id="tcity"  class="form-control">
          <option value="hyderabad">Hyderabad</option>
            <option value="delhi">Delhi </option>
            <option value="shimla">Shimla</option>
            <option value="chennai">Chennai</option>
            <option value="lucknow">Lucknow </option>
            <option value="prayagraj">Prayagraj</option>
            <option value="bengaluru">Bengaluru</option>
            <option value="mumbai">Mumbai</option>
            <option value="kochi">Kochi</option>
            <option value="kolkata">Kolkata </option>
            <option value="jaipur">Jaipur</option>
            <option value="surat">Surat</option>
          </select>
        </div>
        <div class="question">
          <b>Class: </b>
          <div class="form-check">
            <div class="left">
              <input type="radio" name="class" value="Business" style="width: 13px;height: 13px;">
              <label class="form-check-label">Business</label>
            </div> 
            <div class="">
              <input type="radio" name="class" value="Economy"style="width: 13px;height: 13px;" checked>
              <label class="form-check-label">Economy</label>
            </div>
          </div> <br>
        </div>
          <b>INSERT DATE RANGE</b>
          <div class="day-visited"><br>
            FROM :
            <input type="date" name="fdate"  min="2021-04-26" required/>
            TO :
            <input type="date" name="tdate"  min="2021-04-26" required/>

            <div class="btn-block">
              <input type="submit" value="Search Flights"/>
            </div>
          </div>
        </div>
      </form>
    </div>

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
