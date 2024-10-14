
<?php
	$pname = $_POST['pname'];
	$chnum = $_POST['chnum'];
	$cnum = $_POST['cnum'];
	$cname = $_POST['cname'];
	$cage = $_POST['cage'];
	$vname1 = $_POST['vname1'];
	$vname2 = $_POST['vname2'];
	$area = $_POST['area'];
	$state = $_POST['state'];
	$country = $_POST['country'];
		// Database connection
	$conn = new mysqli('localhost','root','','fitindia');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(pname, chnum, cnum, cname, cage, vname1, vname2, area, state, country) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("siisisssss", $pname, $chnum, $cnum, $cname, $cage, $vname1, $vname2, $area, $state, $country );
		$execval = $stmt->execute();
		echo $execval;
		echo "registered successfully...";
		$stmt->close();
		$conn->close();
	}
?>