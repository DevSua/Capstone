
<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
   <title>Item Infomation</title>
   <style>
  body{
        text-align: center; }
      p{
        font-style: italic;
        font-weight: bold;
        font-size: 60px; }
   /* a { text-decoration: none;}
   a:link { color: black; text-decoration: none;} */
   a:visited { color: black; text-decoration: none;}
   a:hover { color: black; text-decoration: none;} 
     table{
        width: 95%;
        border: 1px solid #444444;
        border-collapse: collapse;
        background-color: gray;
        margin:auto;
       }
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
      .left{
         text-align:left;}
      }
   </style>
   </head>
<body>
<div class="left">
      <a href="main_page.html">메인화면</a>
   </div>
   <p><a href="ItemInfo.php">Item Information</sa></p>
   <div id =search style="background-color:#7385B2">
   <form action="ItemInfo_search.php" method="post">
         <select style="width:80px;height:30px;">
          <option value="none">상품번호</option>
            <option value="1">상품명</option>
            <option value="2">가격</option>

            </select>
            <input type="text" style="width:600px;height:25px;" name="p_Info"size="20">
         <input type="submit" style="width:70px;height:30px;" value="검색">
   </form>
   <br>    
   <table>
            <th>상품번호</th>
            <th>상품명</th>
            <th>가격</th>
            <th>상품설명</th>
  
<?php
$host = "localhost";
$user = "chu2";
$pw = "A@!dakota3276";
$dbName = "Shop";

$conn = new mysqli($host, $user, $pw, $dbName);
/* DB 연결 확인 */
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");

$search_option = $_POST['search_option1'];
$p_Info = $_POST['p_Info'];

if(strlen($p_Info) > 0) {
    switch ($search_option) {
      case "none": 
         $sql = "SELECT * FROM Products2 where p_id LIKE '%$p_Info%'";
       break;
    case "1": 
        $sql = "SELECT * FROM Products2 where p_name LIKE '%$p_Info%'";
      break;
    case "2":
      $sql ="SELECT * FROM Products2 where p_price LIKE '%$p_Info%'";
       break;
   }
   $result = $conn->query($sql);
   $num_result = $result->num_rows;

} else
$sql = "select * from Products2";
$result = $conn->query($sql);
$num_result = $result->num_rows;

while($row = mysqli_fetch_array($result)){
    echo '<tr><td>' .$row['p_id'].'</td><td> '.$row['p_name'].'</td><td> '
    .$row['p_price'].'</td><td> '.$row['p_description'].
   "<br>";
 }

mysql_close($conn);
?>

 </table>
   </div>
</body>
</html>
