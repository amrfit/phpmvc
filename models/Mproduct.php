<?php
class Product {
    public function __construct() {
        global $db;
        $this->db = $db;
    }
    
    public function showProduct($id) {
        $query = $this->db->prepare("SELECT * FROM products_tbl WHERE id='$id'");
        $query->execute();
        $result = $query->fetch();
        if ($result == null) {
            echo "محصولی وجود ندارد";
        } else {
            return $result;
        }
    }

    public function relatedProducts($category) {
        $query = $this->db->prepare("SELECT * FROM products_tbl WHERE category='$category'");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
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