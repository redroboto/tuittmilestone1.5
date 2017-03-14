<div class="container-fluid logo">
<img src="img/logo-v4.png">
<h1 id="slogan">Friends for Sale! The easiest way to make friends! </h1>
</div>
<nav class="navbar bg-coral">
	
	<div class="container">
		<div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      
	    </div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<?php if(!isset($_SESSION['username'])){
			echo '<ul class="nav navbar-nav">
				<li><a href="#about">About</a></li>
				<li><a href="#community">Our Community</a></li>
				<li><a href="#testimonials">Customer Testimonials</a></li>
				<li><a href="#sign-up">Registration</a></li>
			</ul>';
			}
			?>
			<?php if(isset($_SESSION['username'])){ ?>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
						<?php
							echo "Logged in as ".$_SESSION['username'];
						?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!-- <li>profile</li> -->
						<li role="separator" class="divider"></li>
						<li><a href="ecommerce-logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
			<?php } ?>
		</div>
	</div>
</nav>