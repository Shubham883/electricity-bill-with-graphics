<!DOCTYPE html>

<head>
	<title>PHP -Electricity Bill Calculator </title>
    <style>
body {
  background-image: url("elecbill.jpg");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-size: 100% 100%;
   
}

body {
    font: 14px sans-serif;
    background-color: #ffffff;

}

.card-body {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;

    word-wrap: break-word;
    background-color: #ffffff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.75);
    border-radius: .25rem;
}

div.container {
    width: 960px;
    height: 610px;
    margin: 50px auto;
    font-family: 'Droid Serif', serif
}
input[type=submit] {
    padding: 10px;
    text-align: center;
    font-size: 18px;
    background: linear-gradient(#ffbc00 5%, #ffdd7f 100%);
    border: 2px solid #e5a900;
    color: #fff;
    font-weight: 700;
    cursor: pointer;
    width: 20%;
    border-radius: 5px
}
h1 {
  color: white;
}
label {
    color: #464646;
    text-shadow: 0 1px 0 #fff;
    font-size: 14px;
    font-weight: 700;
    font-size: 17px;
}
</style>
</head>

<?php
$result_str = $result = '';
if (isset($_POST['unit-submit'])) {
    $units = $_POST['units'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        echo '<h1>' . $result_str =  'Total amount of ' . $units . ' UNITS - ' . $result . 'RS'. '</h1>';
    }
}
/**
 * To calculate electricity bill as per unit cost
 */
function calculate_bill($units) {
    $unit_cost_first = 9.0;  //FOR FIRST 50 
    $unit_cost_second = 12.0;  //FOR NEXT 50
    $unit_cost_third = 15.0;  //FOR ABOVE 100

    if($units <= 50) {
        $bill = $units * $unit_cost_first;
    }
    else if($units > 50 && $units <= 100) {
        $temp = 50 * $unit_cost_first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    }
    else if($units > 100) {
        $temp = (50 * 9.0) + (50 * $unit_cost_second);
        $remaining_units = $units - 100;
        $bill = $temp + ($remaining_units * $unit_cost_third);
    }
    else {
        echo "Enter Correct Units Input";
    }
    return number_format((float)$bill, 2, '.', '');
}

?>

<body>
<div class="container">
<div class="card-body">
	<div id="page-wrap">
		<h1>Php - Calculate Electricity Bill</h1>
		
		<form action="" method="post" id="quiz-form">            
            	<input type="number" name="units" id="units" placeholder="Please enter no. of Units" />            
            	<input type="submit" name="unit-submit" id="unit-submit" value="Submit" />		
		</form>

		<div>
		    <?php echo '<br />' . $result_str; ?>
		</div>	
	</div>
    </div>
</div>
</body>
</html>