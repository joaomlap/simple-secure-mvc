<!doctype html>
<html>

<head>
	
	<title>Seedstars Challenge</title>

</head>

<body>
	
	<h1>List</h1>
	<ul>
		<li><a href="<?php echo URL ?>">Home</a></li>
		<li><a href="<?php echo URL . 'users/index'?>">List</a></li>
	</ul>
	<table>
			<th>Email</th>
			<th>Name</th>

			<?php foreach ($this->attributes['users'] as $user){ ?>
				<tr>
					<td><?php echo $user["email"];?></td>
					<td><?php echo $user["name"];?></td>
				</tr>
			<?php } ?>

	</table>
	

</body>

</html>
