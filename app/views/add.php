<!doctype html>
<html>

<head>
	
	<title>Seedstars Challenge</title>

</head>

<body>
	
	<h1>Add</h1>
	<ul>
		<li><a href="<?php echo URL ?>">Home</a></li>
		<li><a href="<?php echo URL . 'users/index'?>">List</a></li>
	</ul>
	
	<div>
		<?php if(isset($_SESSION["error_messages"])){?>
			<div class="error_messages">
				<?php echo $_SESSION["error_messages"]; ?>
			</div>
			<?php unset($_SESSION["error_messages"]); 
		} ?>
		<?php if(isset($_SESSION["success_messages"])){?>
			<div class="success_messages"><?php echo $_SESSION["success_messages"]; ?></div>
			<?php unset($_SESSION["success_messages"]); 
		} ?>
	</div>
	<form action="<?php echo URL; ?>users/add" method="POST">
		<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
		<input type="text" name="email" placeholder="Enter your email" size="50">
		<input type="text" name="name" placeholder="Enter your name" size="50">
		<input type="submit" value="Submit">
	</form>
	


</body>

</html>