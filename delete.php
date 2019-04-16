<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<title> </title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<head>
<script src="javascript.js"></script>

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
<h2>Delete Item</h2>

<?php

if(isset($_POST['submit'])) {
	if(!empty($_POST['checklist'])) {
		
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
		$sql = "";
		$barcode = "";
	   $ret = $db->exec($sql);
	   if(!$ret) {
		  echo $db->lastErrorMsg();
	   } else {

			foreach($_POST['checklist'] as $check) {
				echo "Barcode number: " .$check. " has been deleted.";
					$sql =<<<EOF
      DELETE from barcode WHERE barcode='$check';
EOF;
			$ret = $db->query($sql);
			echo '<br />';
			}
		
			$db->close();		
			
		}
	}

} else {
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
	$sql = "";
	$barcode = "";
   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {

    $sql =<<<EOF
      SELECT * from barcode;
EOF;

   $ret = $db->query($sql);
   
echo '<br />';

   $firstRow = true;
   echo '<div class="table-responsive"><table class="table">';
   $barcodename = "Barcode";
   $equipmentname = "Equipment";

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
	//First Row Header
    if ($firstRow) {
        echo '<thead><tr>';
        foreach ($row as $key => $value) {
			echo '<th>'."\r".'</th>';
            echo '<th>'.$barcodename.'</th>';
			echo '<th>'.$equipmentname.'</th>';
			break;
        }
        echo '</tr></thead>';
        echo '<tbody>';
        $firstRow = false;
    } 

    echo '<tr>';
		?> <form method ="post" action="delete.php"> <?php
	//Generate inventory data
    foreach ($row as $value) {
		echo '<td>
		<input type="checkbox" name="checklist[]" value="'.$row['barcode'].'">
		</td>';
        echo '<td>'.$row['barcode'].'</td>';
		echo '<td>'.$row['e_name'].'</td>';
		break;
    }
    echo '</tr>';
}
echo '</tbody>';
echo '</table></div>';

   $db->close();
	
?>	<div class="footer">
		<div class="leftalign"><br><input type="submit" formaction="delete.php" name="submit" value="Submit"></div>
	</div>
	</form>
<?php
	}
}
?> 
	
</div>
</body>
</html>