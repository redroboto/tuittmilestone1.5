<?php function display_main(){
	//checks if previous page was user-page-ecommerce.php
	if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']=='http://localhost/exercises/ecommerce/user-page-ecommerce.php'){
		//creates alert if add-item was clicked and if page was loaded to user-page-ecommerce
			echo "<script>alert('item added to cart.');</script>";
	}


?>	
	<main>
		<div class="items container-fluid">
			<h2>Our Selection of Friends:</h2>
			<!-- for admin role, displays add items button -->
			<?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
				echo "<a href='additem.php'><button class='btn btn-default'>ADD</button></a>";
			}
			?>
			<div class="row">
				<?php
				//displays each item for sale based on list array
					require_once('list.php');
					foreach($list as $key => $value){
						echo "<div class='item-selection col-md-4 text-center'>";
						echo "<h4>". $value['name']."</h4>";
						echo "<img class='item-img' src='".$value['image']."'>";
						echo "<p>Description:</p>";
						echo "<p>".$value['description']."</p>";
						echo "<p>Interests:</p>";
						echo "<p>".$value['interest1'].", ".$value['interest2'].", ".$value['interest3']."</p>";
						echo "<p> Intro Fee:<p>";
						echo "<p>$".$value['fee']."</p>";
						if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
							//redirects to edit.php and sets key of clicked item as $key
							echo "<a href='edit-item.php?key=$key'><input class='btn btn-info' type='submit' name='edit' value='edit'></a>

							<a href='delete-item.php?key=$key'><input class='btn btn-danger' type='submit' name='delete' value='delete'></a>  ";
						} else {
							echo "<a href='addtocart.php?key=$key'><input class='btn btn-info' type='submit' name='add' value='add to cart'></a>";
							echo "<a href='item-cart.php'><input class='btn btn-success' type='submit' name='add' value='view cart'></a>";
						}
						echo "</div>";
					}
				?>
			</div>
		</div>
	</main>
<?php } 
//inserts this function in the template
	require_once('template.php'); ?>