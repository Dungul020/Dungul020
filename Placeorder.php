<?php
include_once 'include/conn.php';




$sql = "SELECT * FROM product";
$result =$db->query($sql);


 ?>

<html>
<Meta Charset="UTF-8">
<link rel="stylesheet " type="text/css" href="CSS/shoe zone.css">

<title>Order</title>
<body>
  <h2>Place your order.</h2>
  <form action="./fetchorder.php" method="post">
  <table class="t1" >

    <thead>
      <tr colspan=4>
        <th colspan=4>Shoes in stock</th>
      </tr>
      <tr>
        <th>shoe style</th>
        <th>Shoe name</th>
        <th>Shoe price</th>
        <th>Select</th>
      </tr>
    </thead>
      <tbody>
        <?php
          if($result->num_rows > 0){
            while($row =$result->fetch_assoc()){

              $dataResult = "<tr>";
              $dataResult .= "<td><img src='./image/".$row['image']."' alt='shoe image' width='100px' height='75px'></td>";
              $dataResult .= "<td>".$row['shoe_name']."</td>";
              $dataResult .= "<td>".$row['shoe_price']."</td>";
              $dataResult .= "<td> <input type='checkbox' name='multipleShow[]' value='idShoe_".$row['shoe_id']."'></td>";
              $dataResult .= "</tr>";
              echo $dataResult."\n";
            }

          }else{
            echo "<tr><td>0 Result</td></tr>";
          }

        ?>

      </tbody>
    </table>

  <input type="text"  placeholder="Enter your email Address" name="mail" required=required> <a href="./Regiform.html">Register a account</a>
    <p><input id="bttn" name="sub" type="submit" value="Place Order"> &nbsp;<span id="lnk"></span></p>

  </form>


</body>

</html>
