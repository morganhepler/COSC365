<!DOCTYPE html>
<html>
  <head>
    <title>Order Form</title>
  </head>
  <body>
    <h1>Pizza</h1>
    <form action="" method="post">
      <fieldset>
        <legend>Size</legend>
        <label><input type="radio" name="pizza-size" value="small"> Small</label>
        <label><input type="radio" name="pizza-size" value="medium"> Medium</label>
        <label><input type="radio" name="pizza-size" value="large"> Large</label>
      </fieldset>
      <fieldset>
        <legend>Toppings</legend>
        <label><input type="checkbox" name="topping[]" value="pepperoni"> Pepperoni</label>
        <label><input type="checkbox" name="topping[]" value="bacon"> Bacon</label>
        <label><input type="checkbox" name="topping[]" value="sausage"> Sausage</label>
        <label><input type="checkbox" name="topping[]" value="pineapple"> Pineapple</label>
        <label><input type="checkbox" name="topping[]" value="onions"> Onions</label>
      </fieldset>
      <fieldset>
        <legend>Quantity</legend>
        <select name="quantity">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </fieldset>

      <h1>French Fries</h1>
      <fieldset>
        <legend>Size</legend>
        <label><input type="radio" name="fries-size" value="small"> Small</label>
        <label><input type="radio" name="fries-size" value="large"> Large</label>
      </fieldset>
      <fieldset>
        <legend>Quantity</legend>
        <select name="fries-quantity">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </fieldset>

      <h1>Garlic Knots</h1>
      <fieldset>
        <legend>Size</legend>
        <label><input type="radio" name="knots-size" value="small"> Small</label>
        <label><input type="radio" name="knots-size" value="large"> Large</label>
      </fieldset>
      <fieldset>
        <legend>Quantity</legend>
        <select name="knots-quantity">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </fieldset>

      <h1>Breadsticks</h1>
      <fieldset>
        <legend>Size</legend>
        <label><input type="radio" name="knots-size" value="small"> Small</label>
        <label><input type="radio" name="knots-size" value="large"> Large</label>
      </fieldset>
      <fieldset>
        <legend>Quantity</legend>
        <select name="knots-quantity">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </fieldset>
</form>


<?php
if(isset($_POST['submit'])) {
  $pizzaSize = $_POST['pizzaSize'];
  $toppings = implode(", ", $_POST['toppings']);
  $pizzaQty = $_POST['pizzaQty'];
  $friesSize = $_POST['friesSize'];
  $friesQty = $_POST['friesQty'];
  $knotsSize = $_POST['knotsSize'];
  $knotsQty = $_POST['knotsQty'];
  $breadsticksSize = $_POST['breadsticksSize'];
  $breadsticksQty = $_POST['breadsticksQty'];

  $file = fopen("user_order.txt", "w") or die("Unable to open file!");

  fwrite($file, "Pizza: Size - ".$pizzaSize.", Toppings - ".$toppings.", Quantity - ".$pizzaQty.PHP_EOL);
  fwrite($file, "French Fries: Size - ".$friesSize.", Quantity - ".$friesQty.PHP_EOL);
  fwrite($file, "Garlic Knots: Size - ".$knotsSize.", Quantity - ".$knotsQty.PHP_EOL);
  fwrite($file, "Breadsticks: Size - ".$breadsticksSize.", Quantity - ".$breadsticksQty.PHP_EOL);

  fclose($file);
}
?>