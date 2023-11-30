<?php
include("header.php");
include('dbcon.php');

$test1 = array();
$count1 = 0;
if (isset($_POST['s'])) {
	$startDate = $_POST['txt1'];
	//echo $startDate;
	$endDate = $_POST['txt2'];
	function getBetweenDates1($startDate, $endDate)
	{
		$rangArray = [];

		$startDate = strtotime($startDate);
		$endDate = strtotime($endDate);

		for ($currentDate = $startDate; $currentDate <= $endDate; $currentDate += (86400)) {
			$date = date('Y-m-d', $currentDate);
			$rangArray[] = $date;
		}

		return $rangArray;
	}
	$date = getBetweenDates1($startDate, $endDate);
	//print_r($date);
	foreach ($date as $e1) {


		$sql12 = "SELECT order_total FROM order_table WHERE order_date='$e1'";
		//echo $sql12 . "<br>";
		$d1 = mysqli_query($conn, $sql12);
		$s12 = 0;

		foreach ($d1 as $s2) {
			$s12 = $s2['order_total'] + $s12;
		}
		$test1[$count1]["y"]  = $s12;
		$test1[$count1]["label"]  = $e1;
		$count1 = $count1 + 1;
	}
}



$test = array();
$count = 0;
$sql = "SELECT MAX(order_date) , MIN(order_date) FROM `order_table`";
$a = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($a);
$startDate = $row[1];
$endDate =  date('Y-m-d');




function getBetweenDates($startDate, $endDate)
{
	$rangArray = [];

	$startDate = strtotime($startDate);
	$endDate = strtotime($endDate);

	for ($currentDate = $startDate; $currentDate <= $endDate; $currentDate += (86400)) {
		$date = date('Y-m-d', $currentDate);
		$rangArray[] = $date;
	}

	return $rangArray;
}
$date = getBetweenDates($startDate, $endDate);
foreach ($date as $e) {


	$sql1 = "SELECT order_total FROM order_table WHERE order_date='$e'";
	// echo $sql1."<br>";
	$d = mysqli_query($conn, $sql1);
	$s1 = 0;
	foreach ($d as $s) {
		$s1 = $s['order_total'] + $s1;
	}
	$test[$count]["y"]  = $s1;
	$test[$count]["label"]  = $e;
	$count = $count + 1;
}

?>
<!DOCTYPE HTML>
<html>

<head>
		<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

	<script>
		window.onload = function() {

			var chart1 = new CanvasJS.Chart("chartContainer1", {
				animationEnabled: true,
				//theme: "light2",
				title: {
					text: "Day wise sales"
				},
				axisX: {
					crosshair: {
						enabled: true,
						snapToDataPoint: true
					}
				},
				axisY: {
					title: "Total",
					includeZero: true,
					crosshair: {
						enabled: true,
						snapToDataPoint: true
					}
				},
				toolTip: {
					enabled: false
				},
				data: [{
					type: "area",
					dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart1.render();

			var chart2 = new CanvasJS.Chart("chartContainer2", {
				animationEnabled: true,
				//theme: "light2",
				title: {
					text: "Between 2 Days sales"
				},
				axisX: {
					crosshair: {
						enabled: true,
						snapToDataPoint: true
					}
				},
				axisY: {
					title: "Total",
					includeZero: true,
					crosshair: {
						enabled: true,
						snapToDataPoint: true
					}
				},
				toolTip: {
					enabled: false
				},
				data: [{
					type: "area",
					dataPoints: <?php echo json_encode($test1, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart2.render();
		}
	</script>
</head>

<body>
	<div class="page-wrapper">
		<div class="col-md-10">
			<div class="p-5" id="chartContainer1" style="height: 370px; width: 100%;"></div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
			<div class="col-md-10">

				<div class="row d-flex justify-content-center align-items-center h-40">
					<div class="col-12 col-md-8 col-lg-6 col-xl-5">
						<div class="card bg-pink text-black" style="border-radius: 1rem;">
							<div class="card-body p-4 text-center">

								<div class="mb-md-5 mt-md-4 ">
									<form method="post" action="#">
										<div class="form-outline form-white mb-4">
											<input type="Date" id="typeEmailX" name="txt1" class="form-control form-control-lg" />
											<label class="form-label" for="typeEmailX">Enter the starting Date</label>
										</div>

										<div class="form-outline form-white mb-4">
											<input type="Date" id="typePasswordX" name="txt2" class="form-control form-control-lg" />
											<label class="form-label" for="typePasswordX">Enter the Ending Date</label>
										</div>
										<input type="submit" class="btn btn-outline-dark btn-lg px-5" name="s" value="click">


									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<?php
			if (isset($_POST['s'])) {
			?>
				<div class="col-md-10">
					<div class="p-5" id="chartContainer2" style="height: 370px; width: 100%;"></div>
				</div>
			<?php
			}
			?>

		</div>
	</div>
	</div>

	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

	<?php include('footer.php'); ?>