<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<title> </title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<head>
<script src="javascript.js"></script>

<style>
h3{color: red;}
</style>
</head>

<div class="sidebar">
  <a href="http://localhost:8080/index.html"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="http://localhost:8080/scan.html"><i class='fas fa-barcode'></i> Scan</a>
  <a href="http://localhost:8080/create.html"><i class="fas fa-database"></i> Create Item</a>
  <a href="http://localhost:8080/edit.php"><i class="far fa-edit"></i> Modify Item</a>
  <a href="http://localhost:8080/delete.php"><i class="far fa-trash-alt"></i> Delete Item</a>
  <a href="http://localhost:8080/inventory.php"><i class='far fa-list-alt'></i> Inventory</a>
  <a href="http://localhost:8080/in.html"><i class="far fa-check-circle"></i> Check In</a>
  <a href="http://localhost:8080/out.html"><i class="fas fa-check-circle"></i> Check Out</a>
  <a href="JavaScript:window.close()"><i class="far fa-window-close"></i> Quit</a>
</div>

<body>
<div class="container">
<h2>Item has been modified</h2>

	<?php	
			function displaymessage($fieldname)
			{
				echo "Please enter \"$fieldname\"<br />";
			}
			
			function validatedate($data, $fieldname)
			{
				if(empty($data))
				{
					displaymessage($fieldname);
					$output="";
				}
				
				else
				{
					$output=trim($data);
					$output=stripcslashes($output);
				}
				
				return($output);
			}
			
			$oldbarcode = $_POST['oldbarcode'];
			$equipment=validatedate($_POST['equipment'], "Equipment Data");
			$barcode=validatedate($_POST['barcode'], "Barcode Data");
			
		if(empty($equipment)||empty($barcode))
		{
			echo "";
		}
		else{
			
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('imm.db');
      }
   }
   
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
	  
   } else {
      //echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      UPDATE barcode SET barcode = '$barcode', e_name = '$equipment' WHERE barcode = '$oldbarcode';
EOF;

   $ret = $db->exec($sql);
   if(!$ret) {
	  echo '<br/ ><br/ > <h3> Please enter a new barcode. There is a duplicate barcode. </h3>';
	  
   } else {
	  
	    $sql =<<<EOF
      SELECT * from barcode WHERE barcode='$barcode';
EOF;

   $ret = $db->query($sql);
   
   $firstRow = true;
   echo '<div class="table-responsive"><table class="table">';
   $barcodename = "Barcode";
   $equipmentname = "Equipment";
   
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
    if ($firstRow) {
        echo '<thead><tr>';
        foreach ($row as $key => $value) {
            echo '<th>'.$barcodename.'</th>';
			break;
        }
		foreach ($row as $key => $value) {
            echo '<th>'.$equipmentname.'</th>';
			break;
        }
        echo '</tr></thead>';
        echo '<tbody>';
        $firstRow = false;
    }

    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>'.$value.'</td>';
    }
    echo '</tr>';
}
echo '</tbody>';
echo '</table></div>';

    $sql =<<<EOF
      SELECT * from barcode;
EOF;
echo '<br />';

   $ret = $db->query($sql);
  
   }
   $db->close();

		}

?>


	
</div>
</body>
</html>