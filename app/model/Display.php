<?php namespace Raymondoor\Model;

class Display extends DBoperation{
    public static function articles_index(string $limit='', string $offset='0'){
        if(!empty($limit)){
            $limit = ' LIMIT '.$limit.' OFFSET '.$offset;
        }
        $stmt = 'SELECT articles.*, projects.name AS name, projects.color AS color, categories.name AS category
        FROM articles 
        JOIN projects ON articles.project_id = projects.id 
        JOIN categories ON articles.category_id = categories.id 
        ORDER BY articles.id DESC'.$limit;
        $query = new DBstatement($stmt);
        return $query->execute([]);
    }
    public static function articles_pj(string $pjid, string $limit='', string $offset='0'){
        if(!empty($limit)){
            $limit = ' LIMIT '.$limit.' OFFSET '.$offset;
        }
        $stmt = 'SELECT articles.*, projects.name AS name, projects.color AS color, categories.name AS category
        FROM articles 
        JOIN projects ON articles.project_id = projects.id 
        JOIN categories ON articles.category_id = categories.id 
        WHERE articles.project_id = '.$pjid.' 
        ORDER BY articles.id DESC'.$limit;
        $query = new DBstatement($stmt);
        return $query->execute([]);
    }
    public static function lastArticleId(int $pid=0){
        $place = '';
        if($pid !== 0){
            $place = ' WHERE project_id = '.(string)$pid;
        }
        $stmt = 'SELECT articles.id FROM articles'.$place.' ORDER BY id DESC';
        $query = new DBstatement($stmt);
        return $query->execute([]);
    }
}