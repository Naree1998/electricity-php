<!DOCTYPE html>

<style>
body {
  background-image: url('e.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 1390px 800px;
}
</style>
<head>
	<title>Electricity Bill</title>
</head>

<body>


	<?php
	$result_str = $result = '';
	if (isset($_POST['unit-submit'])) {
	    $units = $_POST['units'];
	    if (!empty($units)) {
	        $result = calculate_bill($units);
	        $result_str = 'Total amount of ' . $units . ' - ' . $result;
	    }
	}


	function calculate_bill($units) {
	    $unit_cost_first = 9.00;
	    $unit_cost_second = 12.00;
	    $unit_cost_third = 15.00;

	    if($units <= 50) {
	        $bill = $units * $unit_cost_first;
	    }
	    else if($units > 50 && $units <= 100) {
	        $temp = 50 * $unit_cost_first;
	        $remaining_units = $units - 50;
	        $bill = $temp + ($remaining_units * $unit_cost_second);
	    }
	    else{
	        $temp = (50 * 9.00) + (50 * $unit_cost_second);
	        $remaining_units = $units - 100;
	        $bill = $temp + ($remaining_units * $unit_cost_third);
	    }

	    return number_format((float)$bill, 2, '.', '');
	}

	?>
</p>



	<div id="page-wrap" style="margin-left:550px;margin-top:220px;">
		<h1 style="margin-left:-40px;"><u>ELECTRICITY BILL</u></h1>

		<form action="" method="post" id="quiz-form">
            	<input type="number" name="units" placeholder="Please enter no. of Units" />
            	<input type="submit" name="unit-submit" id="unit-submit" value="Submit" />
		</form>

		<div>
		    <?php echo '<br />' . $result_str; ?>
		</div>
	</div>
</body>
</html>
