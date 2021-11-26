<?php 
require_once '../../database/dbhelper.php';
require_once '../../utils/utility.php';

$sql = "SELECT category.*,user.username as username FROM category LEFT JOIN user ON category.user_id = user.id";
$resultCategory = executeResult($sql);


/*echo "<pre>";
var_dump($resultCategory);
echo "</pre>";*/


function datatree($data, $parent_id = 0, $level = 0){
    $result = [];
    foreach ($data as $item) {
        if($item['parent_id'] == $parent_id){
            $item['level'] = $level;
            $result[] = $item;
            $child = datatree($data,$item['id'],$level + 1); //mảng danh mục con
            $result = array_merge($result,$child); //gộp các mảng danh mục con vào
        }
    }
    return $result;
}

$resultlist = datatree($resultCategory,0);
/*echo "<pre>";
var_dump($resultlist);
echo "</pre>";*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <ul>
        <?php 
            foreach ($resultlist as $item) {
                echo '<li>'.str_repeat('---', $item['level']).$item['name'].'</li>';//str lặp số lần cho trước
            }
        ?>
        
    </ul>
</body>
</html>

    