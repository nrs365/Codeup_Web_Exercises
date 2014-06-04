<?php
// ^Create a new file named address_book.php in your codeup.dev public folder and open it file for editing. Commit changes and push to GitHub for each step.

// Much like the address book in our example, you'll be creating an address book application that stores entries in a CSV file on your computer. In the same fashion as your todo.php application, you will want to display your entries at the top of the page, and have a form below for adding new entries. Each entry should take a name, address, city, state, zip, and phone. You can use a HTML table or definition lists for displaying the addresses.

// Create a function to store a new entry. A new entry should have validate 5 required fields: name, address, city, state, and zip. Display error if each is not filled out.

// Use a CSV file to save to  list after each valid entry.

// Open the CSV file in a spreadsheet program or text editor and verify the contents are what you expect after adding some entries.

// Refactor your code to use functions where applicable.

// Open the file named address_book.php for editing. Commit changes and push to GitHub for each step.

// Create a function to read the file and display all entries, just like the TODO list.

// Add a delete link with a query string to delete the record. When the page reloads, the record should be gone, and the save csv should no longer have the entry.

// Test that HTML and javascript cannot be executed in your application from XSS or HTML in an entry.
// Add a destructor that echos "Class Dismissed!". Place an unset() at the end of your code. When you run your program, when does the message get displayed?

//Remove the destructor and unset() methods. We'll cover better use cases for this method in future units.

$address_book = [];
$entry = []; 
$filename = './addressbook.csv';

function open_file($filename) {
	$array = [];
	if (is_readable($filename) && filesize($filename) > 0) {
		$filesize = filesize($filename);
   		$read = fopen($filename, 'r');
   		while(!feof($read)) {
   			$row = fgetcsv($read);
			if (!empty($row)){
				$array[] = $row;
			}
		}
   		fclose($read);
   	}
	return $array;
}		

function save_csv($filename, $address_book) {
	$handle = fopen($filename,'w');
	foreach ($address_book as $entry) {
		fputcsv($handle, $entry);
	}
	fclose($handle);
}	
$address_book = open_file($filename);


if(!empty($_POST)) {
	if (empty($_POST['name']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['zip'])) {
	echo "Please enter all required fields.";
	} else { 
		$entry = [$_POST['name'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip']];
		array_push($address_book, $entry);
		save_csv($filename, $address_book);
	}
}
if (isset($_GET['key'])) {
	unset($address_book[$_GET['key']]);
	header('Location: address_book.php');
	save_csv($filename, $address_book);
}
?>
<? var_dump($address_book);?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Address Book</title>
</head>
<body>
	
<table border="1">
<tr>
	<th>Name: </th>
	<th>Address: </th>
	<th>City: </th>
	<th>State:</th>
	<th>Zip:</th>
	<th>Delete:</th>
</tr>
<tr>
	<?php foreach ($address_book as $key => $entry): ?>
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
			<button type="submit" value="save_entry">Save Entry</button>
		</p>
	</form>
</body>
</html>