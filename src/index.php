<!DOCTYPE html>
<?php error_reporting(0); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>FAUCET | dogecoins.pl</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
  </head>

  <body>
	<?php
		include('includes/config.php');
	?>
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Faucet</a>
          </div>
          <div class="collapse navbar-collapse right">
            <ul class="nav navbar-nav">
              <li><a href="http://dogecoins.pl/">Back to dogecoins.pl</a></li>              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

      <!-- Begin page content -->
      <div class="container">	  
	 
	  <form class="form-horizontal gora" role="form" action="send.php" method="POST">
		  <div class="form-group">
			<div class="col-sm-10">
			  <input type="text" name="address" class="form-control input-lg" id="inputEmail3" placeholder="Input Ɖogecoin Wallet Address And Get Free Dogecoins">
			</div>
			<div class="col-sm-2">
			  <button type="submit" class="btn btn-default btn-lg">To the moon!</button>
			</div>
		  </div>		  
		</form>
		<?php 
		$status = $_GET['status'];
		$doge = $_GET['doge'];
		if($status == 1){ ?>
		<p class="center">You gained <?php echo $doge." <strong>DOGE</strong>." ?><br>Please donate us so there will be water in our bowl so we can give you <strong>DOGE</strong>.<br>	
		<?php } elseif($status == 2){?>
		<p class="center">Sorry but we are out of money T_T.<br>Please donate us so there will be water in our bowl so we can give you <strong>DOGE</strong>.<br>	
		<?php } elseif($status == 3){?>
		<p class="center">Sorry but you were using this faucet today. Please come back tommorrow.<br>Please donate us so there will be water in our bowl so we can give you <strong>DOGE</strong>.<br>	
		<?php } else{?>
		<p class="center">This water bowl (aka "<strong>faucet</strong>") is a service that allows you to receive free <strong>DogeCoins</strong> by simply inputing your address.<br>Please donate us so there will be water in our bowl so we can give you <strong>DOGE</strong>.<br>	
		<?php }?>
		<?php echo $dogecoin->getaccountaddress('dogecoins'); ?></p>
		
		<div class="row gora2">
			<div class="col-sm-4 center">
			Average Payout:<br>
			<?php
			$check = "SELECT * FROM logs" or die("Error in the consult.." . mysqli_error($link));
			$result = mysqli_query($link, $check);
			$payout_average = 0;
			while($row = mysqli_fetch_array($result)) {
				$payout_average = $payout_average + $row["payout"];
			} 
			$am = mysqli_num_rows($result);
			$payout_average = $payout_average/$am;
			echo "<strong>".$payout_average."</strong>";
			?>
			</div>
			
			<div class="col-sm-4 center">
			Daily Payout:<br>
			<?php
			$check = "SELECT * FROM logs WHERE DATE(date)=DATE(NOW())" or die("Error in the consult.." . mysqli_error($link));
			$result2 = mysqli_query($link, $check);
			$payout_daily = 0;
			while($row = mysqli_fetch_array($result2)) {
				$payout_daily = $payout_daily + $row["payout"];
			} 
			echo "<strong>".$payout_daily."</strong>";
			?>
			</div>
			
			<div class="col-sm-4 center">
			Total Payout:<br>
			<?php
			$check = "SELECT * FROM logs" or die("Error in the consult.." . mysqli_error($link));
			$result2 = mysqli_query($link, $check);
			$payout_total = 0;
			while($row = mysqli_fetch_array($result2)) {
				$payout_total = $payout_total + $row["payout"];
			} 
			echo "<strong>".$payout_total."</strong>";
			?>
			</div>
		</div>
        
      </div>
	  
	  
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
