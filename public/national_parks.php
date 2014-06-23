<?php

// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'nicole', 'bakagaki');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$stmt = $dbc->query('SELECT name, location, date_established, area_in_acres FROM national_parks');
$stmt = $dbc->query('SELECT * FROM national_parks');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<Title> National Parks</title>
</head>
<body>	
	<table>	
    	<tr>
    		<th>Name</th>
    		<th>Location</th>
    		<th>Date Established</th>
   			<th>Area in Acres</th>
   		</tr>
		
		<tr>
		<? while ($row = $stmt->fetch()) : ?>
    		<tr>	
    			<td><?= $row['name'] ?></td>
    			<td><?= $row['location'] ?></td>
    			<td><?= $row['date_established'] ?></td>
    			<td><?= $row['area_in_acres'] ?></td>
    		</tr>
    	<? endwhile; ?>	
    	</table>
</body>
</html>