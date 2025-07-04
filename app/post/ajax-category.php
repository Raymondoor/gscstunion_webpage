<?php require_once(__DIR__.'/../../vendor/autoload.php');

use Raymondoor\Model\Category;

$value = strtolower(htmlspecialchars($_POST['value']));
try{
    $result = Category::all();
    if(!empty($value)){
        foreach($result as $category){
            $lowcategory = strtolower($category['name']);
            if(strpos($lowcategory, $value) !== false){
                echo '<p class="pure-input-1 optionField" onclick="selectOption('.$category['id'].')" value="#'.$category['name'].'" readonly>'.$category['name'].'</p>';
            }
        }
    }
    exit;
}catch (Exception $e){
    echo '<p class="pure-input-1 optionField" onclick="selectOption('.$category['id'].')" value="--error--" readonly><br>';
    exit;
}