<?php
  session_start();
  $class = $_POST['class'];
  $flight = $_POST['flight'];
  $origin = $_POST['origin'];
  $departure = $_POST['departure'];
  $destination = $_POST['destination'];
  $arrival = $_POST['arrival'];
  $cost = $_POST['cost'];
  $user=$_SESSION["user"];
?>

<!DOCTYPE html>
<html>
  <title>Payment Page</title>
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="payment.css">
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
    <nav id="side">
    <ul>
        <br><br><br><br><br><br><br><br>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="searchflights.php">Book Ticket</a></li>
        <li><a href="enquiry.php">Enquiry</a></li>
        <li style="top: 24px;"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;logout</a></li>
      </ul>
     </nav>
    <img style="top: 120px;" src="https://cdn1.iconfinder.com/data/icons/mobile-device/512/settings-option-configurate-gear-blue-round-512.png" style="width: 70px;"id="menu">
    <br><br><br>
    <div class="row container">
      <div class="col-xs-8 container">
        <div class="container-fluid" style="padding-right: 50px; padding-left: 50px;">
        <form action="ticket.php" method="POST">
          
          <input type='hidden' name='class' value="<?php echo $class ?>" />
          <input type='hidden' name='flight' value="<?php echo $flight ?>" />

          <div class="panel" style="left: 34px;">
            <div class="panel-heading headingstyle">
              <h2><b>Payment Details</b></h2>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label for="Bank_Name">Bank Name</label> <br>
                <select class="form-control" aria-label="slect bank" name="BankName">
                  <option selected value="" disabled> </option>
                  <option value="sbi">SBI</option>
                  <option value="hdfc">HDFC</option>
                  <option value="icici">ICICI</option>
                  <option value="axis">Axis</option>
                  <option value="kotak">Kotak</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Account_Number">Account Number</label> <br>
                <input type="number" class="form-control" name="AccountNumber">
              </div>
            </div>
            <div class="panel-footer text-right" style="align-items:center;">
              <button class="btn btn-info" value="submit" name="button">Submit</button>
              <button class="btn btn-info" value="cancel" name="button">Cancel</button>
            </div>
          </div>
          </form>
        </div>
      </div>
      <div class="col-xs-4 container">
        <div class="container-fluid panel-margin">
        <br>
          <div class="panel">
          <div class="panel-heading headingstyle">
          <h3><b>Billing Details</b></h3>
          </div>
          <div class="panel-body">
          <table class="table table-hover">
            <tr>
              <th>Flight Number</th>
              <td><?php echo $flight?></td>
            </tr>
            <tr>
              <th>From</th>
              <td><?php echo $origin?></td>
            </tr>
            <tr>
              <th>To</th>
              <td><?php echo $destination?></td>
            </tr>
            <tr>
              <th>Departure</th>
              <td><?php echo $departure?></td>
            </tr>
            <tr>
              <th>Arrival</th>
              <td><?php echo $arrival?></td>
            </tr>
            <tr>
              <th>Cost</th>
              <td><?php echo $cost?></td>
            </tr>
          </table>
          </div>
          </div>
        </div>
      </div>
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
      </script> 
  </body>  
</html>
