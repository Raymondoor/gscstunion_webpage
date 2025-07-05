<?php require_once(__DIR__.'/vendor/autoload.php');
use Raymondoor\Controller\UserAuth;
use Raymondoor\Model\Article;
use Raymondoor\Model\Category;
use Raymondoor\Model\Logger;
use Raymondoor\Model\Report;
use Raymondoor\Model\Sns;
use Raymondoor\Model\Project;
use Raymondoor\Model\Timeline;
use Raymondoor\Model\User;

try{
    // initialize db
    $db['usr'] = User::make();
    $dv['su'] = UserAuth::registerSU('admin', 'password');
    $db['pj'] = Project::make();
    $db['cat'] = Category::make();
    $db['art'] = Article::make();
    $db['rep'] = Report::make();
    $db['sns'] = SNS::make();
    $db['tml'] = Timeline::make();
    $db['log'] = Logger::make();
    dump($db);
}catch(Exception $e){
    echo $e->getMessage();
}