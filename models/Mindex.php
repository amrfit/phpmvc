<?php

class Index {
    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function showَArticles(){
        $query = $this->db->prepare("SELECT * FROM article_tbl ORDER BY id DESC");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    // prd

    public function products() {
        $query = $this->db->prepare("SELECT id, name, description, price, image, discount FROM products_tbl WHERE quantity>0 ORDER BY id DESC");
        $query->execute();
        $result = $query->fetchAll();
        if ($result == null) {
            echo "محصولی وجود ندارد";
        } else {
            return $result;
        }
    }

    public function showQuantityPrd($id) {
        $query = $this->db->prepare("SELECT id,quantity FROM products_tbl WHERE id='$id', quantity>0");
        $query->execute();
        $result = $query->fetch();
        if ($result === null) {
            echo "محصولی وجود ندارد";
        } else {
            return $result;
        }
    }
}