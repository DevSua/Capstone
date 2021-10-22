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

                $stmt = $con->prepare("SELECT * FROM person WHERE name='$name'");
                $stmt->execute();

                if ($stmt->rowCount() > 0)
                {
                    $data = array();

                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        extract($row);

                        array_push($data,
                            array('id'=>$id,
                            'name'=>$name,
                            'country'=>$country
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
