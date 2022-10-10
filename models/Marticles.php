<?php

class Articles {
    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function showArticles() {
        $query = $this->db->prepare("SELECT * FROM article_tbl");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }


}