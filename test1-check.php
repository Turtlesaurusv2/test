<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db = "register";

try
{
	$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo "Connected failed: " . $e->getMessage();
}



$data = json_decode( $_POST["json"], true );
$response = [];



$CustomerID = $data['CustomerID'];
$Username = $data['Username'];
$Password = $data['Password'];
$Name = $data['Name'];
$Tel = $data['Tel'];
$Country = $data['Country'];

if  (empty($CustomerID)) {
    $response["success"] = 0;
    $response["message"] = "กรุณากรอก CustomerID";

}else if(empty($Username)){
    $response["message"] = "กรุณากรอก Username ";
    $response["success"] = 0;
}else if(empty($Password)){
    $response["message"] = "กรุณากรอก Password";
    $response["success"] = 0;
}else if(empty($Name)){
    $response["message"] = "กรุณากรอก Name ";
    $response["success"] = 0;
}else {
    $stmt = $conn->prepare("INSERT INTO register SET CustomerID = :CustomerID, Username = :Username, Password = :Password, Name = :Name, Tel = :Tel, Country = :Country"); 
	$stmt->execute([":CustomerID" => $CustomerID, ":Username" => $Username, ":Password" => $Password, ":Name" => $Name, ":Tel" => $Tel, ":Country" => $Country ]); 
    $response["message"] = "บันทึกข้อมูลเสร็จสิ้น";
	$response["success"] = 1;

}

exit(json_encode( $response ));








/*
$stmt = $conn->prepare("INSERT INTO register(CustomerID,Username,Password,Name,Tel,Country) 
values(:CustomerID,:Username,:Password,:Name,:Tel,:Country)");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


$data = json_decode( $_POST["json"], true );

$response = [];

$name = $data["name"];
$des = "Hello world";

if( $name == "somchai")
{
	$stmt = $conn->prepare("INSERT INTO members SET name = :name, description = :des"); 
	$stmt->execute([":name" => $name, ":des" => $des]); 

	


	$response["message"] = "ถูกต้อง";
	$response["success"] = 1;
}
else
{
	$response["message"] = "ไม่ถูกต้อง";
	$response["success"] = 0;
}




exit(json_encode( $response ));*/
?>