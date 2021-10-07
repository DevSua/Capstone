<?php
//결제가 완료됐다는 사실을 알려주기위한 페이지다. alert 으로 관리자에게 배송상태를 완료로 설정합니다. 라고 알려주고 OrderInformation 화면으로 돌아간다.
echo "<script>alert('배송상태를 완료 처리했습니다.');</script>";

$host = "localhost";
$user = "chu2";
$pw = "A@!dakota3276";
$dbName = "Shop";

$conn = new mysqli($host, $user, $pw, $dbName);

mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_results=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");

$tmp=$_GET["o_id"];



$sql = "UPDATE orders2  SET status ='배송완료' WHERE o_id='".$_GET["o_id"]."';";
        $result = $conn->query($sql);

echo "<script>location.replace('OrderInfo.php')</script>";
mysql_close($conn);
 ?>
