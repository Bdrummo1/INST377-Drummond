<?php require_once 'login.php'; //includes the login file

	$conn = new mysqli($hostname, $user, $pword, $database, 3306, '	/Applications/MAMP/tmp/mysql/mysql.sock');
	if ($conn->connect_error) die($conn->connect_error);
	echo "Hello world. We have connected to the database. ";
	$m = "select * FROM `p2` ;";
	$result = $conn->query($m);
	
	if (!$result) die($conn->error);
	$rows = $result->num_rows;
	echo "There are " . $rows . " rows in the Player table. <br>";


?>







<style type: 'text/css'>
div {
	margin: auto;

}

h1 {
	text-align: center;

}
body {
	background-color: #edefff;
	
	text-align: center;

}

div.row {
	
	text-align: center;
	font-size: 20px;
	display: inline-block;
	border:.5px solid#ccc;
	box-sizing: border-box;
	width: 80%;
	background-color: white;
	
}

div.fName {

	
}
input[type=text], input[type=password] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

</style>

<script>

function validateForm() {
	var x = document.getElementById("fName").value;
		if(x == "") {
			alert("Name must be filled out");
				return false;
		} else if(x.length > 30) {
			alert("Name must be less than 30 characters");
			return false;
		} 
		var l = document.getElementById("lName").value;
		if(l == "") {
			alert("Last name must be filled out");
				return false;
		} else if(x.length > 30) {
			alert("Last name must be less than 30 characters");
			return false;
		} 
		var a = document.getElementById("address1").value;
		if(a == "") {
			alert("address1 must be filled out");
				return false;
		} else if(x.length > 100) {
			alert("address1 must be less than 100 characters");
			return false;
		} 
		var a2 = document.getElementById("address2").value;
		if(a2.length > 100) {
			alert("Address must be less than 100 characters");
			return false;
		} 
		var c = document.getElementById("city").value;
		if(c == "") {
			alert("City must be filled out");
				return false;
		} else if(city.length > 30) {
			alert("City must be less than 30 characters");
			return false;
		} 
		var s = document.getElementById("state").value;
		if(s == "") {
			alert("State must be filled out");
				return false;
		} else if(state.length > 30) {
			alert("State must be less than 30 characters");
			return false;
		} 
		var z = document.getElementById("zip").value;
		if(z == "") {
			alert("Name must be filled out");
				return false;
		} else if(z.length != 5) {
			alert("Zip has to be 5 numbers.");
			return false;
		} 
}
	

</script>


 	<body>


 	<div class="content">
 	<div class="container">
 		<div class="row">
 			<h1>Enter Player Data</h1><br>

 			

 			<form id='myForm' action="php.php" onsubmit='return validateForm()' method="post" class="form-horizontal">
 					<div class="form-group">
 					<b><div class = fName><label for="fName" class="control-label col-sm-3">Player's Name</label></div></b>
 					<div class="col-sm-3">
 						<input type="text" class="form-control" id="fName" name="fName" placeholder="First Name">

 						 <span class="error">* <?php echo $fErr;?></span> 
 					</div>
 					<div class="col-sm-4">
 						<input type="text" class="form-control" id="lName" name="lName" placeholder="Last Name">

 						 <span class="error">* <?php echo $lErr;?></span> 
 					</div>
 				</div>
 				<div class="form-group">
 					<b><label for="address1" class="control-label col-sm-3">Address</label></b>
 					<div class="col-sm-4">
 						<input type="text" class="form-control" id="address1" name="address1" placeholder="Address Line 1">

 						<span class="error">* <?php echo $a1Err;?></span> 
 					</div>
 				</div>
				<div class="form-group">
 					<label for="address2" class="control-label col-sm-3"></label>
 					<div class="col-sm-4">
 						<input type="text" class="form-control" id="address2" name="address2" placeholder="Address Line 2">
 					</div>
 				</div>

 				<div class="form-group">
 					<b><label for="city" class="control-label col-sm-3">City, State Zip</label></b>
 					<div class="col-sm-3">
 						<input type="text" name="city" placeholder="City" class="form-control" id="city">

 						<span class="error">* <?php echo $cErr;?></span> 
 					</div>
 					<div class="col-sm-1">
 						<input type="text" name="state" class="form-control" id="state" placeholder="State">

 						 <span class="error">* <?php echo $sErr;?></span> 
 					</div>
 					<div class="col-sm-2">
 						<input type="text" name="zip" class="form-control" id="zip" placeholder="Zip Code">

 						 <span class="error">* <?php echo $zErr;?></span> 
 					</div>
 				</div>
 				<div class="form-group">
 					<input type="submit" value="Submit" class="btn btn-warning pull-right">
 				</div
 			</form>

 			<h2>Current Players</h2>
 			<?php 
 				foreach ($result as $r) {
 					echo "<tr><td>" . "<p>" . $r['number'] . ".  " . $r['fName'] . "  ". $r['lName'] .  "  ".  $r['city'] . "  ". $r['zip'] . "  " . date('m-Y') . "<a href ='edit.php?edit=$r[number]'> Edit </a><br>" . "</p>";
 				}

 			
 			?>
 			</form>
 		</div> <!-- row -->
 	</div> <!-- container -->
 	</div> <!-- content -->
</body>
 <?php 	include 'resources/bsfooter.php';
?>	

