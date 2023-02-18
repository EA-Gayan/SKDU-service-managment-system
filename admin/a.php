<?php
$con=mysqli_connect("localhost", "root", "", "kdu_app");

if(!$con){
	echo "DB not Connected...";
}
else{
$result=mysqli_query($con, "Select * from tbl_service");
if($result>0){
$xml = new DOMDocument("1.0");

// It will format the output in xml format otherwise
// the output will be in a single row
$xml->formatOutput=true;
$fitness=$xml->createElement("services");
$xml->appendChild($fitness);
while($row=mysqli_fetch_array($result)){
	$user=$xml->createElement("service");
	$fitness->appendChild($user);
	
	$uid=$xml->createElement("title", $row['title']);
	$user->appendChild($uid);
	
	$uname=$xml->createElement("description", $row['description']);
	$user->appendChild($uname);
	
	$email=$xml->createElement("open_time", $row['otime']);
	$user->appendChild($email);
	
	$password=$xml->createElement("closed_time", $row['ctime']);
	$user->appendChild($password);
	
	$description=$xml->createElement("category_id", $row['category_id']);
	$user->appendChild($description);
	
	$role=$xml->createElement("featured", $row['featured']);
	$user->appendChild($role);
	
	$pic=$xml->createElement("active", $row['active']);
	$user->appendChild($pic);
	
}
echo "<xmp>".$xml->saveXML()."</xmp>";
$xml->save("report.xml");
}
else{
	echo "error";
}
}
?>
