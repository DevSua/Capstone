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

/* SELECT 예제 */
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
    echo $row['o_id']." ".$row['user_name']." ".$row['address'].
    " ".$row['user_phone']." ".$row['o_time']." ".$row['status']." ".$row['o_total_price']."<br>";
}


mysqli_close($conn);
?>