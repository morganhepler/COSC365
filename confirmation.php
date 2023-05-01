<!DOCTYPE html>
<html>
<head>
	<title>Order Confirmation</title>
</head>
<body>
	<?php
		// Check if form was submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Open the file
			$file = fopen("order.txt", "r") or die("Unable to open file!");

			// Read the contents of the file
			$order = fread($file, filesize("order.txt"));

			// Close the file
			fclose($file);

			// Display the order
			echo "<h1>Thank you for your order!</h1>";
			echo "<p>Your order:</p>";
			echo "<pre>" . $order . "</pre>";
		}
		else {
			echo "<h1>No order found.</h1>";
		}
	?>
</body>
</html>
