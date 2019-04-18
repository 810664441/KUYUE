<?php
    include("../inc/dbconn.php");
    $type = $_POST['type'];
    $page = $_POST['page'];
    $sql = "select * from goods where item='$type'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $arr[] = $row;
        }
    }
   $len = count($arr);
   for($i = ($page-1)*24;$i < ($page*24);$i ++ ){
       if($len > $i){
           $res[] = $arr[$i];
       }
   }
   $data = array('res' => $res,'len' => $len);


    echo (json_encode($data));
    



    

