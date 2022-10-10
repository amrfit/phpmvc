<?php

class Products {
    public function __construct() {
        global $db;
        $this->db = $db;
    }

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


    
}