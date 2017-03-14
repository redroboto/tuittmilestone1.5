<?php function display_main(){ 
	if(isset($_SESSION['username'])){
		header('location:user-page-ecommerce.php');
	}
?>	
	<main>
	<!-- banner and sign up form -->
		<div class="banner container-fluid">
			<div class="col-md-8"></div>
			<div class="col-md-4">
				<h3>Sign In</h3>
				<form method="POST">
					<p>Username:</p>
					<input type="text" name="username"><br>
					<p>Password:</p>
					<input type="password" name="password"><br><br>
					<input class="btn btn-info" type="submit" name="login" value="login">
					
				</form>
				<a href="#sign-up">Don't have an account yet?</a>
			<!-- checks username and password from json users array -->
			<?php 
			$string = file_get_contents('json/users.json');
			$users = json_decode($string, true);
			if(isset($_POST['login'])) {
				$username = $_POST['username'];
				$password = sha1($_POST['password']);
				$flag = 0;

				foreach($users as $user){
					if($username == $user['username']){
						$flag = 1;
						if($password == $user['password']){
							echo "Welcome ".$user['username']."!";
							$_SESSION['username'] = $user['username'];
							$_SESSION['role'] = $user['role'];
							header("Location: user-page-ecommerce.php");
						}
						else{
							echo "Incorrect password";
						}
					}
				}
				if($flag == 0){
					echo "Username not found";
				}

			}

			?>
			</div>
		</div>
		<div class="about container-fluid row text-left" id="about">
			<div class="col-md-8">
				<h1>About Friends for Sale</h1>
				<p class="large-font">Everybody needs friends. Sometimes though, life gets too busy. Other times, it just takes too much effort to meet new people.</p>
				<p class="large-font">
				Friends for Sale offers a more convenient and straight-forward way of meeting new people. We'll be the ones to introduce you and set things up for a very reasonable fee. </p>
				<h1>How it works</h1>
				<p class="large-font">
				Our goal is to introduce you to potential friends. Just go through our selection, add your desired friends to your cart, and click check out. Once the fee is paid, we will set up a first meeting with your new friends.
				</p>
			</div>
			<div class="col-md-4">
			</div>
		</div>
		<div class="items container-fluid" id="community">
			<h1>Our Community</h1>
			<p class="large-font">Friends for Sale is full of interesting people that would make great friends! Just take a look at a few of our offerings. </p>
			<div class="row">
				
					<?php
					//displays items in list array
					//edit this to limit display to first 3 items only
						require_once('list.php');
						$list = array_slice($list, 0,3);
						foreach($list as $value){
							echo "<div class='col-md-4 text-center'>";
							echo "<h4>". $value['name']."</h4>";
							echo "<img class='item-img' src='".$value['image']."'>";
							echo "<p>Description:</p>";
							echo "<p>".$value['description']."</p>";
							echo "<p>Interests:</p>";
							echo "<p>".$value['interest1'].", ".$value['interest2'].", ".$value['interest3']."</p>";
							echo "<p> Intro Fee:<p>";
							echo "<p>$".$value['fee']."</p>";
							echo "</div>";
						}
					?>
				
			</div>
		</div>
		<div class="carousel-wrapper container-fluid" id="testimonials">
		  <h2>What our customers say</h2>
		  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
		      <div class="item active">
		      <h4>"Who says money can't buy friends? They don't know what they're talking about! <br> With Friends for Sale, I was able to meet a lot of new people through a small investment. Worth it!"<br><span style="font-style:normal;color: #1761a0;">Haru Doctolero, Vice President, The T-Gang Japan Chapter</span></h4>
		      </div>
		      <div class="item">
		        <h4>"When my crush denied me, I thought I would never find love again. Then Friends for Sale happened. <br> Now i'm in a great relationship, all thanks to my friends!"<br><span style="font-style:normal; color: #1761a0; ">Jonathan Labostro Doydora, Soldier of Love</span></h4>
		      </div>
		      <div class="item">
		        <h4>"I am a man of few words so I don't usually go out with people. <br> But through Friends for Sale, I was able to meet Leila de Lima, the love of my life."<br><span style="font-style:normal;color: #1761a0;">Geodel Natabio, Actor, Supermodel, T-Shirt Designer, Sweet Lover</span></h4>
		      </div>
		    </div>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="color: #cf1717"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="color: #cf1717"></span>
		      <span class="sr-only">Next</span>
		    </a>
		  </div>
	</div>
	<div class="sign-up container-fluid row" id="sign-up">
		<div class="col-md-6">
			<h2>Be a part of our community. It's free!</h2>
			<p class="large-font">Start meeting some new people today. Check out our selection! </p>
		</div>
		<div class="col-md-6">
			<h3>Sign up today for free:</h3>
			<form method="POST">
				<p>Username: </p>
				<input type="text" name="new_username"><br>
				<p>Password: </p>
				<input type="password" name="new_password"><br>
				<p>Confirm Password:</p>
				<input type="password" name="confirm"><br><br>
				<input class="btn btn-info" type="submit" name="register" value="register">
			</form>
		<?php
		if(isset($_POST['register'])){
		
			if($_POST['new_password'] == $_POST['confirm']) {
				$newuser = ['username' => $_POST['new_username'],
				'password' => sha1($_POST['new_password'])];
				$newuser['role'] = 'regular';
			
	 
				$string = file_get_contents('json/users.json');
				$users = json_decode($string, true);

				array_push($users,$newuser);

				$fp = fopen('json/users.json','w');
				fwrite ($fp, json_encode($users,JSON_PRETTY_PRINT));
				fclose ($fp);
				echo "<script>alert('Registration Successful!');</script>";
			}
			else{
				echo "Passwords do not match";
			}
		}
		?>
		</div>
		</div>
	</main>

<?php }
	require_once('template.php');
 ?>
