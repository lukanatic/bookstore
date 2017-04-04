<?php
	session_start();

	# title...
	$title = "view products";

	# import db connection
	include 'config/db.php';

	# import functions
	include 'includes/functions.php';

	# import header..
	include 'includes/dashboard_header.php';

	$errors = [];


?>


<div class="wrapper">
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>Book Title</th>
						<th>Author</th>
						<th>Price</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $row['product']; ?></td>
						<td>maja</td>
						<td>January, 10</td>
						<td><a href="#">edit</a></td>
						<td><a href="#">delete</a></td>
					</tr>
          		</tbody>
			</table>
		</div>

