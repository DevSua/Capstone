<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
   <title>Order Infomation</title>
   <style>
 body{
        text-align: center; }
      p{
        font-style: italic;
        font-weight: bold;
        font-size: 60px; }
     table{
        width: 95%;
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
      .left{
         text-align:left;}
      }
   </style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
</script>
<script>
$(document).ready(function() {
function update() {
  $.ajax({
   type: 'POST',
    url: 'Ajaxtest.php',
   timeout: 3000,
   success: function(data) {
      $("#search").html(data); 
      window.setTimeout(update, 3000);
   }
  });
 }
 update();
});
</script>
</head>

<body>
   <div class="left">
      <a href="main_page.html">메인화면</a>
   </div>
   <p>Order Information</p>

   <div id="search" style="background-color: #EFA3A3">

         <input type="text" style="width:600px;height:25px;" placeholder="정보입력" name="Info"size="20">
         <input type="submit" style="width:70px;height:30px;" value="검색">
   </form>
         <br>
   <table>
            <th>아이디</th>
            <th>비밀번호</th>
            
<?php
$host = "localhost";
$user = "chu2";
$pw = "A@!dakota3276";
$dbName = "Shop";

$conn = new mysqli($host, $user, $pw, $dbName);

mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");


$sql = "select * from ajaxtest";
        $result = $conn->query($sql);
        $num_result = $result->num_rows;

while($row = mysqli_fetch_array($result)){
    echo '<tr><td>.' .$row['login_id'].'</td><td> '.$row['login_pw']."<br>";
 }

mysql_close($conn);
?>
 </table>
 </form>
   </div>
</body>
</html>