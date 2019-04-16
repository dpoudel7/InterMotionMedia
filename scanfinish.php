<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<title> </title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css">
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
<h2>Completed and The checked in item will be Displayed below with edit/Delete feature</h2>

	<form action ="#" action="">
			Name: <input type="text" name="barcode"><br /><br />
			Location: <input type="text" name="barcode"><br /><br />
		<input type="submit" formaction="startscan.php" value="Check in another item">
		<input type="submit" formaction="scanfinish.php" value="Complete Check In">
	</form> 
	
</div>
</body>
</html>