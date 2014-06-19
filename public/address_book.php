<?php
require_once('classes/address_data_store.php');

$address_book = [];
$entry = []; 
$filename = './addressbook.csv';

$ads = new Address_data_store('./addressbook.csv');
$address_book = $ads->read_csv();

if(!empty($_POST)) {
	if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['zip'])) {
	echo "Please enter all required fields.";
	} else { 
		$entry = [$_POST['name'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['phone']];
		array_push($address_book, $entry);
		$ads->write_csv($address_book);
	}
}
if (isset($_GET['key'])) {
	unset($address_book[$_GET['key']]);
	header('Location: address_book.php');
	$ads->write_csv($address_book);
}
if(isset($_FILES['upload'])) {
	var_dump($_FILES);
	$filename = $_FILES['upload']['name'];
	$upload_directory = '/vagrant/sites/codeup.dev/public/uploads/';
	$upload_filename = basename($filename);
	$saved_filename = $upload_directory . $upload_filename;
	move_uploaded_file($_FILES['upload']['tmp_name'], $saved_filename);

	$uploadedfile = new Address_data_store($saved_filename);
	$uploadedentry = $uploadedfile->read_csv();
	$address_book = array_merge($address_book, $uploadedentry); 
	$ads->write_csv($address_book);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Address Book</title>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="/css/journal_bootstrap.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="/js/bootstrap.min.js"></script>
</head>
<body>
	<h1>Address Book</h1>
	
	<table border="1">
	<tr>
		<th>Name</th>
		<th>Address</th>
		<th>City</th>
		<th>State</th>
		<th>Zip</th>
		<th>Phone</th>
		<th>Delete</th>
	</tr>
	<tr>
		<?php foreach ($address_book as $key => $entry): ?>
			<?if (!isset($entry['5'])) : ?>
			<? array_push($entry, '')?>
			<? endif ?>
		<?php foreach ($entry as $value): ?>
			<td><?= $value ?></td>
		<?php endforeach ?>
		<td><?= "<a href=\"?key=$key\">Delete</a>" ?></td>
	</tr>
		<?php endforeach ?>
	</table>
	<form method="POST" action="address_book.php">
		<p>
			<label for="name">Name: </label>
				<input type="text" id="name" name="name" required>
		</p>
		<p>
			<label for="address">Street Address: </label>
				<input type="text" id="address" name="address" required>
		</p>
		<p>
			<label for="city">City:  </label>
				<input type="text" id="city" name="city" required>
		</p>
		<p>
			<label for="state">State: </label>
				<input type="text" id="state" name="state" required>
		</p>	
		<p>
			<label for="zip">ZIP: </label>
				<input type="text" id="zip" name="zip" required>	
		</p>
		<p>
			<label for="phone">Phone: </label>
				<input type="text" id="phone" name="phone">
		</p>
		<p>
			<button type="submit" value="save_entry">Save Entry</button>
		</p>
	</form>
	<form method="POST" enctype="multipart/form-data" action="address_book.php">
		<p>
			<label for="upload">Upload: </label>
				<input type="file" id="upload" name="upload">
		</p>
		<p>
			<button type="submit">Upload File</button>
		</p>
	</form>
</body>
</html>