<!DOCTYPE html>
<html lang="kr">
  <head>
    <meta charset="utf-8">
    <title>H-mart 로그인</title>
    <style>
div{
    /* width:300px;
    height:300px;  */
    position:absolute;
    left:50%;
    top:50%;
    margin-left:-150px;
    margin-top:-150px;
     }
 p{
     text-align:center;
    }
body{
    font-size:30px;
}
    </style>
  </head>
  <body>
    <form  method="post">
        <div>
      <p>H-mart 관리자 로그인</p></br>
      <img src="https://www.kindpng.com/picc/m/192-1925162_login-icon-png-transparent-png.png"
      width="30" height="30">  ID
       : <input type="text" name="uid" style="width:150px; height:25px; font-size:20px;"></br>
      <img src="https://png.pngtree.com/png-vector/20190118/ourlarge/pngtree-vector-lock-icon-png-image_323863.jpg"
      width="30" height="30">
      PASSWORD:<input type="password" name="pwd" style="width:150px; height:25px; font-size:20px;"></br></br>
      <input type="submit" value="로그인"style="width:10em; height:30px;">
       </div>
    <?php
    $host = "localhost";
    $user = "chu2";
    $pw = "A@!dakota3276";
    $dbName = "Shop";
    
    $conn = new mysqli($host, $user, $pw, $dbName);
    if(isset($_POST['uid'])&&isset($_POST['pwd'])){//post방식으로 데이터가 보내졌는지?
        $username=$_POST['uid'];//post방식으로 보낸 데이터를 username이라는 변수에 넣는다.
        $userpw=$_POST['pwd'];//post방식으로 보낸 데이터를 userpw라는 변수에 넣는다.
       
        //sql문을 sql변수에 저장해놓는다.
        $sql="SELECT * FROM login_member where login_id='$username'&&login_pw='$userpw'";
        if($result=mysqli_fetch_array(mysqli_query($conn,$sql))){//쿼리문을 실행해서 결과가 있으면 로그인 성공
             header('location:OrderInfo.php');
        }
        else{//쿼리문의 결과가 없으면 로그인 fail을 출력한다.
          echo "<script>alert('로그인 실패');</script>";
        }
      }
    ?>
    </form>
  </body>
</html>