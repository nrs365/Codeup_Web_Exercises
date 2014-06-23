<?php

function getOffset() {
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	return ($page - 1) * 4;
}

// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'nicole', 'bakagaki');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

// $stmt = $dbc->query('SELECT name, location, date_established, area_in_acres FROM national_parks');
// $stmt = $dbc->query('SELECT * FROM national_parks');

$query = 'SELECT * FROM national_parks LIMIT 4 OFFSET ' . getOffset();
//$park = $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();
$count = $dbc->query('SELECT count(*) FROM national_parks')->fetchColumn();
$parks = $dbc->query($query)->fetchAll(PDO::FETCH_ASSOC);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$numPages = ceil($count / 4);
$next_page = $page + 1;
$previous_page = $page - 1;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<Title>National Parks</title>
</head>
<body>	
	<div>
	<table>	
    	<tr>
    		<th>Name</th>
    		<th>Location</th>
    		<th>Date Established</th>
   			<th>Area in Acres</th>
   		</tr>
		
		<tr>
		<? foreach ($parks as $park) : ?>
    		<tr>	
    			<td><?= $park['name']; ?></td>
    			<td><?= $park['location']; ?></td>
    			<td><?= $park['date_established']; ?></td>
    			<td><?= $park['area_in_acres']; ?></td>
    		</tr>
    	<? endforeach; ?>	
    	</table>
    	<ul class="pager">
          <li class="previous_disabled"><a href="<?="?page=$previous_page"?>">Previous</a></li>
          <li class="next"><a href="<?="?page=$next_page"?>">Next</a></li>
        </ul>
    </div>
</body>
</html>