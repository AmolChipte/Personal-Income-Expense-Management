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
	
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
		$(document).ready(function(){
   		$("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
      		});
    	}).change();
		});
	</script>
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
				<li class="active">All Reports</li>
			</ol>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">All Reports</h1>
			</div>
		</div><!--/.row-->
<div class="row">
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div>
       			<select>
     				<option>-- Choose Report --</option>
           			<option value="today">Today's Report</option>
           			<option value="yesterday">Yesterday's Report</option>
					<option value="weekly">Last 7 Days's Report</option>
					<option value="monthly">Last 30 Days's Report</option>
					<option value="yearly">Current Year's Report</option>
					<option value="total">Total's Report</option>
       			</select>
    		</div>
		</div>
	</div>
</div>

<div class="row">
	<br><br><div class="total box">
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
				<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_total_expense;?>" ><span class="percent">
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
</div>	
<div class="row">
<div class="today box">
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
				<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_total_expense;?>" ><span class="percent">
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
<div class="row">
<div class="yesterday box">
    <div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<?php
				//Yestreday Income
				$userid=$_SESSION['detsuid'];
				$ydate=date('Y-m-d',strtotime("-1 days"));
				$query1=mysqli_query($con,"select sum(IncomeCost)  as yesterdayincome from tblincome where (IncomeDate)='$ydate' && (UserId='$userid');");
				$result1=mysqli_fetch_array($query1);
				$sum_yesterday_income=$result1['yesterdayincome'];
 				?> 
				<h4>Yesterday's Income</h4>
				<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_yesterday_income;?>" ><span class="percent">
					<?php if($sum_yesterday_income=="")
					{
						echo "0";
					} else 
					{
						echo $sum_yesterday_income;
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
				//Yestreday Expense
				$userid=$_SESSION['detsuid'];
				$ydate=date('Y-m-d',strtotime("-1 days"));
				$query1=mysqli_query($con,"select sum(ExpenseCost)  as yesterdayexpense from tblexpense where (ExpenseDate)='$ydate' && (UserId='$userid');");
				$result1=mysqli_fetch_array($query1);
				$sum_yesterday_expense=$result1['yesterdayexpense'];
 				?> 
				<h4>Yesterday's Expense</h4>
				<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_yesterday_expense;?>" ><span class="percent">
					<?php if($sum_yesterday_expense=="")
					{
						echo "0";
					} else 
					{
						echo $sum_yesterday_expense;
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
				//Total Yesterday's Saving
                $userid=$_SESSION['detsuid'];
				$ydate=date('Y-m-d',strtotime("-1 days"));
                //income
				$queryincome1=mysqli_query($con,"select sum(IncomeCost)  as yesterdayincome from tblincome where (IncomeDate)='$ydate' && (UserId='$userid');");
				$resultincome1=mysqli_fetch_array($queryincome1);
				$sum_yesterday_income=$resultincome1['yesterdayincome'];
                //expense
				$queryexpense1=mysqli_query($con,"select sum(ExpenseCost)  as yesterdayexpense from tblexpense where (ExpenseDate)='$ydate' && (UserId='$userid');");
				$resultexpense1=mysqli_fetch_array($queryexpense1);
				$sum_yesterday_expense=$resultexpense1['yesterdayexpense'];
 				?> 
				<h4>Yesterday's Balance</h4>
				<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_yesterday_expense;?>" ><span class="percent">
                    <?php 
                    $yesterday_balance = $sum_yesterday_income - $sum_yesterday_expense;
                    if ($sum_yesterday_income == '')
                    {
                        echo "0";
                    }
                    else
                    {
                        echo $yesterday_balance;
                    }
                    ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="row">
<div class="weekly box">
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<?php
				//Weekly Income
				$userid=$_SESSION['detsuid'];
 				$pastdate=  date("Y-m-d", strtotime("-1 week")); 
				$crrntdte=date("Y-m-d");
				$query2=mysqli_query($con,"select sum(IncomeCost)  as weeklyincome from tblincome where ((IncomeDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
				$result2=mysqli_fetch_array($query2);
				$sum_weekly_income=$result2['weeklyincome'];
 				?>
				<h4>Last 7 day's Income</h4>
				<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_weekly_income;?>"><span class="percent">
					<?php if($sum_weekly_income=="")
					{
						echo "0";
					} else 
					{
						echo $sum_weekly_income;
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
				//Weekly Expense
				$userid=$_SESSION['detsuid'];
 				$pastdate=  date("Y-m-d", strtotime("-1 week")); 
				$crrntdte=date("Y-m-d");
				$query2=mysqli_query($con,"select sum(ExpenseCost)  as weeklyexpense from tblexpense where ((ExpenseDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
				$result2=mysqli_fetch_array($query2);
				$sum_weekly_expense=$result2['weeklyexpense'];
 				?>
				<h4>Last 7 day's Expense</h4>
				<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_weekly_expense;?>"><span class="percent">
					<?php if($sum_weekly_expense=="")
					{
						echo "0";
					} else 
					{
						echo $sum_weekly_expense;
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
				//Total weekly's Saving
                $userid=$_SESSION['detsuid'];
				$pastdate=  date("Y-m-d", strtotime("-1 week")); 
				$crrntdte=date("Y-m-d");
                //income
				$queryincome2=mysqli_query($con,"select sum(IncomeCost)  as weeklyincome from tblincome where ((IncomeDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
				$resultincome2=mysqli_fetch_array($queryincome2);
				$sum_weekly_income=$resultincome2['weeklyincome'];
                //expense
				$queryexpense2=mysqli_query($con,"select sum(ExpenseCost)  as weeklyexpense from tblexpense where ((ExpenseDate) between '$pastdate' and '$crrntdte') && (UserId='$userid');");
				$resultexpense2=mysqli_fetch_array($queryexpense2);
				$sum_weekly_expense=$resultexpense2['weeklyexpense'];
 				?> 
				<h4>Last 7 Day's Balance</h4>
				<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_weekly_expense;?>" ><span class="percent">
                    <?php 
                    $weekly_balance = $sum_weekly_income - $sum_weekly_expense;
                    if ($sum_weekly_income == '')
                    {
                        echo "0";
                    }
                    else
                    {
                        echo $weekly_balance;
                    }
                    ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="row">
<div class="monthly box">
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<?php
				//Monthly Income
				$userid=$_SESSION['detsuid'];
 				$monthdate=  date("Y-m-d", strtotime("-1 month")); 
				$crrntdte=date("Y-m-d");
				$query3=mysqli_query($con,"select sum(IncomeCost)  as monthlyincome from tblincome where ((IncomeDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
				$result3=mysqli_fetch_array($query3);
				$sum_monthly_income=$result3['monthlyincome'];
 				?>
				<h4>Last 30 Day's Incomes</h4>
				<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_monthly_income;?>" ><span class="percent">
					<?php if($sum_monthly_income=="")
					{
						echo "0";
					} else 
					{
						echo $sum_monthly_income;
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
				//Monthly Expense
				$userid=$_SESSION['detsuid'];
 				$monthdate=  date("Y-m-d", strtotime("-1 month")); 
				$crrntdte=date("Y-m-d");
				$query3=mysqli_query($con,"select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
				$result3=mysqli_fetch_array($query3);
				$sum_monthly_expense=$result3['monthlyexpense'];
 				?>
				<h4>Last 30 Day's Expenses</h4>
				<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_monthly_expense;?>" ><span class="percent">
					<?php if($sum_monthly_expense=="")
					{
						echo "0";
					} else 
					{
						echo $sum_monthly_expense;
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
				//Total Monthly's Saving
                $userid=$_SESSION['detsuid'];
 				$monthdate=  date("Y-m-d", strtotime("-1 month")); 
				$crrntdte=date("Y-m-d");
                //income
				$queryincome3=mysqli_query($con,"select sum(IncomeCost)  as monthlyincome from tblincome where ((IncomeDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
				$resultincome3=mysqli_fetch_array($queryincome3);
				$sum_monthly_income=$resultincome3['monthlyincome'];
                //expense
				$queryexpense3=mysqli_query($con,"select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
				$resultexpense3=mysqli_fetch_array($queryexpense3);
				$sum_monthly_expense=$resultexpense3['monthlyexpense'];
 				?> 
				<h4>Last 30 Day's Balance</h4>
				<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_monthly_expense;?>" ><span class="percent">
                    <?php 
                    $monthly_balance = $sum_monthly_income - $sum_monthly_expense;
                    if ($sum_monthly_income == '')
                    {
                        echo "0";
                    }
                    else
                    {
                        echo $monthly_balance;
                    }
                    ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="row">
<div class="yearly box">
	<div class="col-xs-6 col-md-3">
		<div class="panel panel-default">
			<div class="panel-body easypiechart-panel">
				<?php
				//Yearly Income
				$userid=$_SESSION['detsuid'];
 				$cyear= date("Y");
				$query4=mysqli_query($con,"select sum(IncomeCost)  as yearlyincome from tblincome where (year(IncomeDate)='$cyear') && (UserId='$userid');");
				$result4=mysqli_fetch_array($query4);
				$sum_yearly_income=$result4['yearlyincome'];
 				?>
				<h4>Current Year Incomes</h4>
				<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $sum_yearly_income;?>" ><span class="percent">
					<?php if($sum_yearly_income=="")
					{
						echo "0";
					} else 
					{
						echo $sum_yearly_income;
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
				//Yearly Expense
				$userid=$_SESSION['detsuid'];
 				$cyear= date("Y");
				$query4=mysqli_query($con,"select sum(ExpenseCost)  as yearlyexpense from tblexpense where (year(ExpenseDate)='$cyear') && (UserId='$userid');");
				$result4=mysqli_fetch_array($query4);
				$sum_yearly_expense=$result4['yearlyexpense'];
 				?>
				<h4>Current Year Expenses</h4>
				<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $sum_yearly_expense;?>" ><span class="percent">
					<?php if($sum_yearly_expense=="")
					{
						echo "0";
					} else 
					{
						echo $sum_yearly_expense;
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
				//Total Yearly's Saving
                $userid=$_SESSION['detsuid'];
 				$cyear= date("Y");
                //income
				$queryincome4=mysqli_query($con,"select sum(IncomeCost)  as yearlyincome from tblincome where (year(IncomeDate)='$cyear') && (UserId='$userid');");
				$resultincome4=mysqli_fetch_array($queryincome4);
				$sum_yearly_income=$resultincome4['yearlyincome'];
                //expense
				$queryexpense4=mysqli_query($con,"select sum(ExpenseCost)  as yearlyexpense from tblexpense where (year(ExpenseDate)='$cyear') && (UserId='$userid');");
				$resultexpense4=mysqli_fetch_array($queryexpense4);
				$sum_yearly_expense=$resultexpense4['yearlyexpense'];
 				?> 
				<h4>Current Year's Balance</h4>
				<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $sum_yearly_expense;?>" ><span class="percent">
                    <?php 
                    $yearly_balance = $sum_yearly_income - $sum_yearly_expense;
                    if ($sum_yearly_income == '')
                    {
                        echo "0";
                    }
                    else
                    {
                        echo $yearly_balance;
                    }
                    ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
</div>  <!--/.row-->
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