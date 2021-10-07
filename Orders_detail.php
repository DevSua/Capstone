<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
   <title>Order Detail</title>
   <style>
   header {
     background-color: white;
     padding: 30px;
     text-align: center;
     font-size: 35px;
     color: black;
   }
     body{

       text-align: center; }
     footer {
        background-color: #EFA3A3;
        padding: 80px;
        text-align: center;
        }
      p{
        background-color: #white;
        font-style: italic;
        font-weight: bold;
        font-size: 60px; }
      p2{
        font-style: Malgun Gothic;
        font-weight: bold;
        font-size: 30px; }
     table{
        width: 100%;
        border: 1px solid #444444;
        border-collapse: collapse;
        background-color: gray;
        margin:auto;
       }
       a { text-decoration: none;}
       a:link { color: black; text-decoration: none;}
       a:visited { color: black; text-decoration: none;}
       a:hover { color: black; text-decoration: none;}
       th,td {
         border: 1px solid #444444;
        padding: 10px; }
      }
     th{
         background-color: white
      }
      td{
         border: 1px solid #444444;
        padding: 10px;
        background-color: white;

      }
      div{
         padding:15px;
      }
   </style>
   </head>
<body>
<header>
   <p><?php echo $_GET["user_name"] ?>  Order</p>
</header>


   <div id="search" style="background-color: #EFA3A3">
<!-- 여기다가 누구누구 구매내역이라고 적어 -->
<div id="asd" style="background-color: #ffffff">
<p2><?php echo $_GET["user_name"] ?>  님의 상품 구매 정보</p2>
</div>
         <br>
 <table>
     <tr>
            <th>구매 상품명</th>
            <th>개수</th>
            <th>가격</th>
    </tr>
<?php
$host = "localhost";
$user = "chu2";
$pw = "A@!dakota3276";
$dbName = "Shop";

$conn = new mysqli($host, $user, $pw, $dbName);

mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");

$tmp=$_GET["o_id"];


$sql = "select orders_detail2.product_name,orders_detail2.o_quantity,Products2.p_price from orders_detail2,Products2 where orders_o_id='".$_GET["o_id"]."' and orders_detail2.product_name=Products2.p_name;";
        $result = $conn->query($sql);
        // $num_result = $result->num_rows;

while($row = mysqli_fetch_array($result)){
    echo '<tr><td> '.$row['product_name'].'</td><td> '.$row['o_quantity'].'</td><td> '.$row['p_price'].'<br></tr>';
    //echo "<tr><td>asdf</td><td>asdf2</td><td>asdf3</td></tr>";
 }

?>

 </table>

   </div>
   <footer>
     <div style="background-color: #13B7AD">
     <a href="DeliverComplete.php?o_id=<?php echo $tmp; ?>"><p2>배송 완료</p2></a>
     </div>
   </footer>
</body>

</html>
<?php
mysql_close($conn);
 ?>
