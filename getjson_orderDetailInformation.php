<?php
// 수아야 이 파일 건드리면 안된다!
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    include('dbcon.php');

    $android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");

    if( (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])) || $android )
    {

        $o_id=$_POST['o_id'];

        if(empty($o_id)){
            $errMSG = "인덱스를 입력하세요";
        }

        if(!isset($errMSG))
        {
            try{

                $stmt = $con->prepare("SELECT orders_detail2.product_name,orders_detail2.o_quantity,Products2.p_price,Products2.image_url FROM orders_detail2,Products2 WHERE orders_o_id='$o_id' AND orders_detail2.product_name=Products2.p_name");
                $stmt->execute();

                if ($stmt->rowCount() > 0)
                {
                    $data = array();

                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        extract($row);

                        array_push($data,
                            array('product_name'=>$product_name,
                            'o_quantity'=>$o_quantity,
                            'p_price'=>$p_price,
                            'image_url'=>$image_url
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
