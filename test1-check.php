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

print_r($data);
exit;

$CustomerID = $_POST['CustomerID'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Name = $_POST['Name'];
$Tel = $_POST['Tel'];
$Country = $_POST['Country'];

if  (empty($CustomerID)) {

    $response["message"] = "กรุณากรอกCustomerID";
	$response["success"] = 1;


}
else
{
    $stmt = $conn->prepare("INSERT INTO register SET CustomerID = :CustomerID, Username = :Username, Password = :Password, Name = :Name, Tel = :Tel, Country = :Country"); 
	$stmt->execute([":CustomerID" => $CustomerID, ":Username" => $Username, ":Password" => $Password, ":Name" => $Name, ":Tel" => $Tel, ":Country" => $Country ]); 
    $response["message"] = "`gliH0lbho";
	$response["success"] = 0;

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