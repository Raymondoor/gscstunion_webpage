<?php
require_once (__DIR__ . '/general/DIR.php');
require_once (API_DIR . '/general/DATABASE_PROCESS.php');
require_once (API_DIR . '/general/LOG.php');
require_once (API_DIR . '/general/TEXT_FORMAT.php');

class New_article {
    private $title;
    private $date;
    private $main;
    private $video;
    private $newid;
    public function __construct ($title, $date, $main, $video) {
        $this->title = $title;
        $this->date = $date;
        $this->main = $main;
        $this->video = $video;
    }
    public function InsertDB () {
        $query = new DatabaseStatement("INSERT INTO article (title, date, main, video) VALUES (:title, :date, :main, :video)");
        $result = $query->Operation([
            ':title' => $this->title,
            ':date' => $this->date,
            ':main' => $this->main,
            ':video' => $this->video,
        ]);
        if ($result) {
            $log_data = date("Y-m-d H:i:s") . ', NEW, "' . $this->title . '"';
            generate_log('/article/article-', $log_data);
            if ($this->newid = $query->lastInsertId()) {
                return $this->MakeFile();
            }
        }
    }

    public function MakeFile () {
        $page = file_get_contents(TEMPLATE_DIR . '/page.php');
        $page = str_replace('obTITLE', $this->title, $page);
        $page = str_replace('obDATE', $this->date, $page);
        $page = str_replace('obMAIN', attach_link($this->main), $page);
        $page = str_replace('obVIDEO', remove_style($this->video), $page);

        if(!is_dir(ARTICLES_DIR . '/page')) {
            mkdir(ARTICLES_DIR . '/page', 0755);
        }
        $filename = ARTICLES_DIR . '/page/' . $this->newid . '.php';
        $file = fopen($filename, 'w');
        fwrite($file, $page);
        fclose($file);
        chmod($filename, 0755);
        return $this->newid;
    }
}