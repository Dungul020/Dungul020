<?php
include_once 'include/conn.php';

 ?>

<html>
<Meta Charset="UTF-8">
<link rel="stylesheet " type="text/css" href="CSS/shoe zone.css">

<title>Order detail</title>
<body>
<h2>Order summary</h2>
      <?php




        if(isset($_POST['mail'])) {
          $searchEmail = $_POST['mail'];
          $sqlemail = "SELECT id, email_address, delivery_address FROM customer WHERE email_address LIKE '%$searchEmail' ";
          $resultEmail =$db->query($sqlemail);



    if($resultEmail->num_rows > 0){

      while($rows = $resultEmail->fetch_assoc()) {
?>


<table class="t1">
    <thead>
      <tr>
        <th colspan="3">Shoes in stock</th>
      </tr>
      <tr>

        <th>shoestyle</th>
        <th>Shoename</th>
        <th>Shoeprice</th>

      </tr>
    </thead>

    <tbody>
<?php

          $myArray = $_POST['multipleShow'];
           $shopSubTotal = 0;
           $total = 0;
            foreach($myArray as $key => $value){
              $idShoe = $value;
              $id = explode("_",$idShoe);
                $sql = "SELECT shoe_id, image, shoe_name, shoe_price FROM product WHERE shoe_id =".$id[1]."";
                $result =$db->query($sql);

                if($result->num_rows > 0){
                  while($row = $result->fetch_assoc()) {
                    $shopSubTotal += $row['shoe_price'];
                    $dataResult = "<tr>";
                    $dataResult .= "<td><img src='./image/".$row['image']."' alt='' width='100px' height='75px'></td>";
                    $dataResult .= "<td>".$row['shoe_name']."</td>";
                    $dataResult .= "<td>".$row['shoe_price']."</td>";
                    $dataResult .= "</tr>";
                        echo $dataResult;
                  }

                }else {
                  echo ('No record found.<br />');
               }
            }
              $total = $shopSubTotal+($shopSubTotal * (15 /100));
               echo "<tr><td colspan='2'>subTotal:</td><td>".number_format($shopSubTotal, 2, '.', '')."</td></tr>";
               echo "<tr><td colspan='2'><b>Total with VAT:</b></td><td>".number_format($total, 2, '.', '')."</td></tr>";

?>
  </tbody>
  </table>



<?php
echo "<br>Thank you for shopping with us ".$rows['email_address'];

echo "<br>Your order will be delivered to address: ".$rows['delivery_address'];
          }
          }else{
            echo 'Sorry you dont have an account please, register <a href="./Regiform.html">HERE</a>';
          }

      }else{
            echo 'typing your email';
      }
      ?>

 <p><a href="./Placeorder.php">Home</a>';</p>

</body>

</html>
