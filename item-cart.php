
<?php function display_main(){ ?>	
	<main>
		<div class="items container-fluid">
			<h2>Friends Selected:</h2>
			<a href='user-page-ecommerce.php'><input class='btn btn-info' type='submit' name='back' value='back to selection'></a>
			<a href='unavailable.php'><input class='btn btn-success' type='submit' name='back' value='Check Out Items'></a>
			<div class="row">
			<?php 

			require_once('list.php');

			if(isset($_SESSION['cart_items'])) {
					$total_fee = 0;
					foreach ($_SESSION['cart_items'] as $key => $quantity){
					$name = $list[$key]['name'];
					$image = $list[$key]['image'];
					$description = $list[$key]['description'];
					$interest1 = $list[$key]['interest1'];
					$interest2 = $list[$key]['interest2'];
					$interest3 = $list[$key]['interest3'];
					$fee = $list[$key]['fee'];

					$total_fee = (int)$fee + $total_fee;

					//echo "<div class='item_image'><img src='$image'></div>";

					//echo "<h3>$name</h3> $description <br>
					//$fee";

					echo "<div class='item-selection col-md-4 text-center'>";
					echo "<h4>". $name."</h4>";
					echo "<img class='item-img' src='".$image."'>";
					echo "<p>Description:</p>";
					echo "<p>".$description."</p>";
					echo "<p> Intro Fee:<p>";
					echo "<p>$".$fee."</p>";
					echo "<a href='cancel-selection.php?key=$key'><input class='btn btn-danger' type='submit' name='cancel' value='remove'></a>";
					echo "</div>";
				}

			}
			else echo "error"; 
			?>
			</div>
			<?php 
				echo "<h3>Total number of items in cart: ".count($_SESSION['cart_items'])."</h3>";
				echo "<h3>Total amount is: $".$total_fee."</h3>";
				echo "<a href='unavailable.php'><input class='btn btn-success' type='submit' name='back' value='Check Out Items'></a>";
			?>
		</div>
	</main>
<?php } 
//inserts this function in the template
	require_once('template.php'); ?>
