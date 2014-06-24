<?php
// Get new instance of PDO object
$dbc = new PDO('mysql:host=127.0.0.1;dbname=codeup_pdo_test_db', 'nicole', 'bakagaki');

// Tell PDO to throw exceptions on error
$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt  = $dbc->query('SELECT count(*) FROM national_parks');
$count = $stmt->fetchColumn();

$query = 'SELECT * FROM national_parks LIMIT 4 OFFSET ' . getOffset();
$stmt  = $dbc->query($query);
$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$numPages = ceil($count / 4);
$next_page = $page + 1;
$previous_page = $page - 1;

//for pagentation
function getOffset() {
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	return ($page - 1) * 4;
}
//starting the form
if (isset($_POST['name']) && isset($_POST['location']) && isset($_POST['date_established']) && isset($_POST['area_in_acres']) && isset($_POST['description'])) {
	//add try catch throw for exceptions

	//logic to add to database 
//if($_POST) {	
	$stmt = $dbc->prepare('INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :date_established, :area_in_acres, :description)');

	$stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
	$stmt->bindValue(':location', $_POST['location'], PDO::PARAM_STR);
	$stmt->bindValue(':date_established', $_POST['date_established'], PDO::PARAM_STR);
	$stmt->bindValue(':area_in_acres', $_POST['area_in_acres'], PDO::PARAM_INT);
	$stmt->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
	$stmt->execute();
}
//var_dump($_POST);	
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
   			<th>Description</th>
   		</tr>
		
		<tr>
		<? foreach ($parks as $park) : ?>
    		<tr>	
    			<td><?= $park['name']; ?></td>
    			<td><?= $park['location']; ?></td>
    			<td><?= $park['date_established']; ?></td>
    			<td><?= $park['area_in_acres']; ?></td>
    			<td><?= $park['description']; ?></td>
    		</tr>
    	<? endforeach; ?>	
    	</table>
    	<ul class="pager">
          <li class="previous_disabled"><a href="<?="?page=$previous_page"?>">Previous</a></li>
          <li class="next"><a href="<?="?page=$next_page"?>">Next</a></li>
        </ul>
    </div>

    <h3>Add a park</h3>
    <form method="POST" action="/national_parks.php">
    	<p>
	   		<label for="name">Name</label>
	   		<input type="text" id="name" name="name">
	   	</p>
	   	<p>
	   		<label for="location">Location</label>
	   		<input type="text" id="location" name="location">
	   	</p>	
	   	<p>
	        <label for="date_established">Date Established<label>
	        <input type="text" id="date_established" name="date_established">
	   	</p>
	   	<p>
	   		<label for="area_in_acres">Area in Acres</label>
	   		<input type="text" id="area_in_acres" name="area_in_acres">
	  	</p>
	  	<p>
	  		<label for="description">Description</label>
	  		<input type="text" id="description" name="description">
	  	</p>
	  	<p>
	  		<input type="submit" value="submit park">
	  	</p>		
	</form>  	 		   		
</body>
</html>