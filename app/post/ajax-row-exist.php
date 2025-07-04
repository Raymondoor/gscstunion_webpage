<?php require_once(__DIR__.'/../../vendor/autoload.php');
use Raymondoor\Model\DBstatement;
$allowedTables = ['users', 'projects', 'articles', 'log'];
$table = $_POST['table'];
$column = $_POST['column'];
$value = $_POST['value'];
if(in_array($table, $allowedTables))
try{
    $stmt = 'SELECT '.$column.' FROM '.$table.' WHERE '.$column.' = :value';
    $query = new DBstatement($stmt);
    $result = $query->execute([':value' => $value]);
    if(!empty($result)){
        echo json_encode(1);
        exit;
    }
    echo json_encode(0);
    exit;
}catch(Exception $e){
    echo json_encode(-1);
    exit;
}