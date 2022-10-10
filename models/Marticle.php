<?php

class Articles {
    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function showَArticle($id){
        $query = $this->db->prepare("SELECT * FROM article_tbl WHERE id='$id'");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function relatedPosts($category) {
        $query = $this->db->prepare("SELECT * FROM article_tbl WHERE category='$category'");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

}