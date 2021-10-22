<?php
// 수아야 이 파일 건드리면 안된다!
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    include('dbcon.php');

    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

    if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android )
    {

        $name=$_POST['name'];

        if(empty($name)){
            $errMSG = "이름을 입력하세요.";
        }

        if(!isset($errMSG))
        {
            try{

                $stmt = $con->prepare("SELECT * FROM orders2 WHERE user_name='$name'");
                $stmt->execute();

                if ($stmt->rowCount() > 0)
                {
                    $data = array();

                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        extract($row);

                        array_push($data,
                            array('o_id'=>$o_id,
                            'user_name'=>$user_name,
                            'address'=>$address,
                            'user_phone'=>$user_phone,
                            'o_time'=>$o_time,
                            'status'=>$status,
                            'o_total_price'=>$o_total_price
                        ));
                    }

                    header('Content-Type: application/json; charset=utf8');
                    $json = json_encode(array("webnautes"=>$data), JSON_PRETTY_PRINT+JSON_UNESCAPED_UNICODE);
                    echo $json;
                }




            } catch(PDOException $e) {
                die("Database error: " . $e->getMessage());
            }
        }

    }

?>
