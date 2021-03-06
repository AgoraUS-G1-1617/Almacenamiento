<?php

include 'config.php';

try{

	header("Content-Type:application/json");
	$conn = new mysqli($servername,$username, $pass, $dbname);
	if ($conn->connect_error) {
		echo($conn->connect_error);
	    throw new Exception;
	} 
	$sql = "SELECT distinct id_poll FROM Votes ";
	$result = $conn->query($sql);
	
	$votations = array();
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $votations[] = $row["id_poll"];
	    }
	}
	
	echo json_encode(array("votations"=>$votations, "msg" => 1));
	$conn->close();
}catch(Exception $e){
	echo json_encode(array("msg"=>0));
}
die();
?>