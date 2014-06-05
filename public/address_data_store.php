<?php
class Address_data_store {
	public $filename = '';

	function __construct($name_of_file) {
		$this->filename = $name_of_file;
	}
		
	function open_file() {
		$array = [];
		if (is_readable($this->filename) && filesize($this->filename) > 0) {
			$filesize = filesize($this->filename);
	   		$read = fopen($this->filename, 'r');
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

	function save_csv($address_book) {
		$handle = fopen($this->filename,'w');
		foreach ($address_book as $entry) {
			fputcsv($handle, $entry);
		}
		fclose($handle);
	}	
}
?>