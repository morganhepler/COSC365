<!DOCTYPE html>
<head>
<title>Confirmation</title>
    <link href="confirmation.css" type="text/css" rel="stylesheet"/> 
</head>
<body>
	<?php
		//Order Array
		$order = array();
		$file_order = array();

		//Get Order Name
		$name = $_POST["name"];

		//Specialty Pizza Quantity Data
		$buff_chick_quantity = $_POST["buff-chick-quantity"];
		$hawaii_quantity = $_POST["hawaii-quantity"];
		$bbq_chick_quantity = $_POST["bbq-chick-quantity"];
		$deluxe_quantity = $_POST["deluxe-quantity"];
		$chick_bacon_quantity = $_POST["chick-bacon-quantity"];

		//Custom Pizza Quantity Data
		$pizza_quantity = $_POST["quantity"];

		//Additional Menu Items Quantity Data
		$knots_quantity= $_POST["knots-quantity"];
		$breadsticks_quantity = $_POST["breadsticks-quantity"];
		$cheese_quantity = $_POST["cheese-quantity"];

		//Add Special Pizzas to Order Array
		if($buff_chick_quantity != "0") {
			$buff_chick_size = $_POST["buff-chick-size"];
			$order[] = $buff_chick_quantity . " " . $buff_chick_size . " " . "Buffalo Chicken Pizza";
			$file_order[] = $buff_chick_quantity . " " . $buff_chick_size . " " . "Buffalo Chicken Pizza";
		}
		if($hawaii_quantity  != "0") {
			$hawaii_size = $_POST["hawaii-size"];
			$order[] = $hawaii_quantity . " " . $hawaii_size . " " . "Hawaiian Pizza";
			$file_order[] = $hawaii_quantity . " " . $hawaii_size . " " . "Hawaiian Pizza";
		}
		if($bbq_chick_quantity != "0") {
			$bbq_chick_size = $_POST["bbq-chick-size"];
			$order[] = $bbq_chick_quantity . " " . $bbq_chick_size . " " . "BBQ Chicken Pizza";
			$file_order[] = $bbq_chick_quantity . " " . $bbq_chick_size . " " . "BBQ Chicken Pizza";
		}
		if($deluxe_quantity  != "0") {
			$deluxe_size = $_POST["deluxe-size"];
			$order[] = $deluxe_quantity . " " . $deluxe_size . " " . "Deluxe Pizza";
			$file_order[] = $deluxe_quantity . " " . $deluxe_size . " " . "Deluxe Pizza";
		}
		if($chick_bacon_quantity != "0") {
			$chick_bacon_size = $_POST["chick-bacon-size"];
			$order[] = $chick_bacon_quantity . " " . $chick_bacon_size . " " . "Chicken Bacon Ranch Pizza";
			$file_order[] = $chick_bacon_quantity . " " . $chick_bacon_size . " " . "Chicken Bacon Ranch Pizza";
		}

		//Add Custom Pizza to Order Array
		if($pizza_quantity != "0") {
			$pizza_size = $_POST["pizza-size"];

			//Toppings Array
			$toppings = array();

			//Custom Topping Data
			$pepperoni = $_POST["pepperoni"];
			$bacon = $_POST["bacon"];
			$sausage = $_POST["sausage"];
			$chicken = $_POST["chicken"];
			$pineapple = $_POST["pineapple"];
			$onions = $_POST["onions"];
			$mushrooms = $_POST["mushrooms"];

			//Add Custom Toppings to the Toppings Array
			if(isset($pepperoni)) {
				$toppings[] = $pepperoni;
			}
			if(isset($bacon)) {
				$toppings[] = $bacon;
			}
			if(isset($sausage)) {
				$toppings[] = $sausage;
			}
			if(isset($chicken)) {
				$toppings[] = $chicken;
			}
			if(isset($pineapple)) {
				$toppings[] = $pineapple;
			}
			if(isset($onions)) {
				$toppings[] = $onions;
			}
			if(isset($mushrooms)) {
				$toppings[] = $mushrooms;
			}

			$topping_list = "";

			//Get List of Toppings
			if($pizza_quantity != "0") {
				foreach ($toppings as $topping) {
					$topping_list = $topping_list . $topping . ", ";
				}
			}

			$order[] = $pizza_quantity . " " . $pizza_size . " " . "Pizza<br>Toppings: " . rtrim($topping_list, ", ");
			$file_order[] = $pizza_quantity . " " . $pizza_size . " " . "Pizza\nToppings: " . rtrim($topping_list, ", ");
		}
		
		//Add Additional Items to Order Array
		if($knots_quantity != "0") {
			$knots_size = $_POST["knots-size"];
			$order[] = $knots_quantity . " " . $knots_size . " " . "Garlic Knots";
			$file_order[] = $knots_quantity . " " . $knots_size . " " . "Garlic Knots";
		}
		if($breadsticks_quantity  != "0") {
			$breadsticks_size = $_POST["breadsticks-size"];
			$order[] = $breadsticks_quantity . " " . $breadsticks_size . " " . "Breadsticks";
			$file_order[] = $breadsticks_quantity . " " . $breadsticks_size . " " . "Breadsticks";
		}
		if($cheese_quantity != "0") {
			$cheese_size = $_POST["cheese-size"];
			$order[] = $cheese_quantity . " " . $cheese_size . " " . "Cheesesticks";
			$file_order[] = $cheese_quantity . " " . $cheese_size . " " . "Cheesesticks";
		}
	?>

	<div class="top-content">
		<i class="fa-solid fa-house"></i>
		<h1><?= $name ?>, Thank You!</h1>
		<p>We will begin preparing your order shortly. Please review your order information below. </p>
	</div>
	<div class="order">
		<p>
		<?php   
			//Get Complete Order
			foreach ($order as $order_item) {
				print("<span>" . $order_item . "</span><br>");
			} 
		?>
		</p>
	</div>

    <?php
        //Write Order to File
		$file = file_put_contents('orders.txt', $name . "\n", FILE_APPEND);
		foreach ($file_order as $file_order_item) {
			$file = file_put_contents('orders.txt', $file_order_item . "\n", FILE_APPEND);
		} 

		$file = file_put_contents('orders.txt', "\n", FILE_APPEND);
		
        if($file === false) {
            die('There was an error writing to file');
        }
	?>
</body>
</html> 