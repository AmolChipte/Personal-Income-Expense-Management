<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

  

  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Income & Expense Tracker - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
					</a>
				</li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<?php
				//Total Income
				$userid=$_SESSION['detsuid'];
				$query5=mysqli_query($con,"select sum(IncomeCost)  as totalincome from tblincome where UserId='$userid';");
				$result5=mysqli_fetch_array($query5);
				$sum_total_income=$result5['totalincome'];
 				?>
				<h4>Total Incomes</h4>
				<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_total_income;?>" ><span class="percent">
					<?php if($sum_total_income=="")
					{
						echo "0";
					} else 
					{
						echo $sum_total_income;
					}
					?></span>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<?php
				//Total Expense
				$userid=$_SESSION['detsuid'];
				$query5=mysqli_query($con,"select sum(ExpenseCost)  as totalexpense from tblexpense where UserId='$userid';");
				$result5=mysqli_fetch_array($query5);
				$sum_total_expense=$result5['totalexpense'];
 				?>
				<h4>Total Expenses</h4>
				<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_total_expense;?>" ><span class="percent">
					<?php if($sum_total_expense=="")
					{
						echo "0";
					} else 
					{
						echo $sum_total_expense;
					}
					?></span>
				</div>
			</div>
		</div>
	</div>
    <div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<?php
				//Total Saving
                $userid=$_SESSION['detsuid'];
                //income
				$queryincome5=mysqli_query($con,"select sum(IncomeCost)  as totalincome from tblincome where UserId='$userid';");
				$resultincome5=mysqli_fetch_array($queryincome5);
				$sum_total_income=$resultincome5['totalincome'];
                //expense
				$queryexpense5=mysqli_query($con,"select sum(ExpenseCost)  as totalexpense from tblexpense where UserId='$userid';");
				$resultexpense5=mysqli_fetch_array($queryexpense5);
				$sum_total_expense=$resultexpense5['totalexpense'];
 				?> 
				<h4>Total Balance</h4>
				<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_yearly_expense;?>" ><span class="percent">
                    <?php 
                    $total_balance = $sum_total_income - $sum_total_expense;
                    if ($sum_total_income == '')
                    {
                        echo "0";
                    }
                    else
                    {
                        echo $total_balance;
                    }
                    ?></span>
				</div>
			</div>
		</div>
	</div>
</div>		
<div class="row">
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<?php
				//Total Today's Income
				$userid=$_SESSION['detsuid'];
				$tdate=date('Y-m-d');
				$query=mysqli_query($con,"select sum(IncomeCost)  as todaysincome from tblincome where (IncomeDate)='$tdate' && (UserId='$userid');");
				$result=mysqli_fetch_array($query);
				$sum_today_income=$result['todaysincome'];
 				?> 
				<h4>Today's Income</h4>
				<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_today_income;?>" ><span class="percent">
					<?php if($sum_today_income=="")
						{
							echo "0";
						} else 
						{
							echo $sum_today_income;	
						}

					?></span>
				</div>
			</div>
		</div>
	</div>
    <div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<?php
				//Total today's Expense
				$userid=$_SESSION['detsuid'];
				$tdate=date('Y-m-d');
				$query=mysqli_query($con,"select sum(ExpenseCost)  as todaysexpense from tblexpense where (ExpenseDate)='$tdate' && (UserId='$userid');");
				$result=mysqli_fetch_array($query);
				$sum_today_expense=$result['todaysexpense'];
 				?> 
				<h4>Today's Expense</h4>
				<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_today_expense;?>" ><span class="percent">
					<?php if($sum_today_expense=="")
					{
						echo "0";
					} else 
					{
						echo $sum_today_expense;
					}
					?></span>
				</div>
			</div>
		</div>
	</div>
    <div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<?php
				//Total today's Saving
                $userid=$_SESSION['detsuid'];
				$tdate=date('Y-m-d');
                //income
				$queryincome=mysqli_query($con,"select sum(IncomeCost)  as todaysincome from tblincome where (IncomeDate)='$tdate' && (UserId='$userid');");
				$resultincome=mysqli_fetch_array($queryincome);
				$sum_today_income=$resultincome['todaysincome'];
                //expense
				$queryexpense=mysqli_query($con,"select sum(ExpenseCost)  as todaysexpense from tblexpense where (ExpenseDate)='$tdate' && (UserId='$userid');");
				$resultexpense=mysqli_fetch_array($queryexpense);
				$sum_today_expense=$resultexpense['todaysexpense'];
 				?> 
				<h4>Today's Balance</h4>
				<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_today_expense;?>" ><span class="percent">
                    <?php 
                    $today_balance = $sum_today_income - $sum_today_expense;
                    if ($sum_today_income == '')
                    {
                        echo "0";
                    }
                    else
                    {
                        echo $today_balance;
                    }
                    ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
</div>	<!--/.main-->

    <?php include_once('includes/footer.php');?>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>
<?php } ?>