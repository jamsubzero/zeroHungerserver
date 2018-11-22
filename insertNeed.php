<?php
//$host='localhost';
//$uname='root';
//$pwd='';
//$db="emapz";
//========
$host='localhost';
$uname='root';
$pwd='';
$db="zeroHunger";

$conn = new mysqli($host,$uname,$pwd, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$flag['code']=0;
//0 for failed, 1 for success

        // prepare and bind
$stmt = $conn->prepare("INSERT INTO `needhavedb` (`userID`, `item_name`, `desc`, `lati`, `longi`, `need_have`, `date_time`) 
      VALUES (?, ?, ?, ?, ?, ?, NOW());");
$stmt->bind_param("ssssss", $userID, $item_name, $desc, $lati, $longi, $need_have);

// set parameters and execute

$userID = $_REQUEST['userID'];
$item_name = $_REQUEST['item_name'];
$desc = $_REQUEST['desc'];
$lati = $_REQUEST['lati'];
$longi = $_REQUEST['longi'];
$need_have = $_REQUEST['need_have'];


$success = $stmt->execute();

//printf("Error: %s.\n", $stmt->error);

//INSERT INTO `emapz`.`notifs` (`clientUN`, `date_Time`, `lati`, `longi`, `method`) 
//        VALUES ('+639178806503', '2017-11-09 16:46:26', '122.8559436', '10.1737101', 'SMS');
//$success = mysql_query("INSERT INTO notifs (clientUN, lati, longi, helpType) "
//            . " VALUES('$user','$lat','$long','$') ",$con) or die ("error insert");

if($success){
$flag['code']=1;
}
print(json_encode($flag));

?>




