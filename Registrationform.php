<?php



$firstname  = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$emailaddress = $_POST['emailaddress'];
$phonenumbe = $_POST['phonenumber'];
$idnumber = $_POST['idnumber'];
$deliveryaddress = $_POST['deliveryaddress'];




if(isset($firstname) !== "" && isset($lastname) !== ""){
  require_once 'include/conn.php';

  $stmt = $db->prepare("INSERT INTO customer(first_name,last_name,email_address,id_number,phone_number,delivery_address) VALUES(?,?,?,?,?,?)");
  $stmt->bind_param("ssssss", $firstname,$lastname,$emailaddress, $idnumber,$phonenumbe,$deliveryaddress);
  $result = $stmt->execute();
  $stmt->close();
  $db->close();

  if($result){
     echo "<b>$emailaddress you are successfully registered click the link to start shopping</b>";
   }else {
     echo "something went wrong";
   }

}

?>
  <p><a href="./Placeorder.php">Place order</a></p>
