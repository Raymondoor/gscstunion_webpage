<?php
require_once (__DIR__ . '/general/DIR.php');
require_once (API_DIR . '/general/DATABASE_PROCESS.php');
require_once (API_DIR . '/general/LOG.php');
require_once (API_DIR . '/general/TEXT_FORMAT.php');

class Delete_article {
    private $id;
    public function __construct ($id) {
        $this->id = $id;

    }
    public function DeleteDB () {
        $query = new DatabaseStatement("SELECT title FROM article WHERE id = :id");
        $title = $query->Operation([':id' => $this->id]);
        $query = new DatabaseStatement("DELETE FROM article WHERE id = :id");
        $result = $query->Operation([':id' => $this->id]);
        if (!$result) {
            throw new Exception("Failed to delete article from database.");
        }
        if ($result) {
            $log_data = date("Y-m-d H:i:s") . ', DEL, "' . $title[0]['title'] . '"';
            generate_log('/article/article-', $log_data);
            if ($result) {
                return $this->RemoveFile();
            }
        }
    }

    public function RemoveFile () {
        $deletion = ARTICLES_DIR . '/page/' . $this->id . '.php';
        return unlink($deletion);
    }
}