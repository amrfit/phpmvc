<?php

class Admin {
    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function uploader($pic,$dir,$pre) {
        $filename = $pic['name'];
        $exp = explode('.',$filename);
        $ext = end($exp);
        if (!is_dir("public/images/admin/".$dir)) {
            mkdir("public/images/admin/".$dir);    
        }
        $newname = $pre.rand(999,10000).'.'.$ext;
        $from = $pic['tmp_name'];
        $to = "public/images/admin/".$dir."/".$newname;
        move_uploaded_file($from,$to);
        return $to;
    }

    public function addArticle($data,$to) {
        $query = $this->db->prepare("INSERT INTO article_tbl (name,body,category,status,image) VALUES ('$data[title]','$data[body]','$data[category]','$data[status]','$to')");
        $query->execute();
    }

    public function showَArticle($id) {
        $query = $this->db->prepare("SELECT * FROM article_tbl WHERE id='$id'");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function showَArticles() {
        $query = $this->db->prepare("SELECT * FROM article_tbl");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function updateArticle($id,$data,$to) {
        $query = $this->db->prepare("UPDATE article_tbl SET name='$data[title]',body='$data[body]',status='$data[status]',category='$data[category]',image='$to',link='$data[link]' WHERE id='$id'");
        $query->execute();
    }

    public function deleteArticle($id) {
        $query = $this->db->prepare("DELETE FROM article_tbl WHERE id=$id");
        $query->execute();
    }

    //  ARTICLE CATEGORY

    public function addCategories($cat)  {
        $query = $this->db->prepare("INSERT INTO articlecat_tbl (title,parent,status) VALUES ('$cat[title]','$cat[parent]','$cat[status]')");
        $query->execute();
    }

    public function selectParentCategories() {
        $query = $this->db->prepare("SELECT * FROM articlecat_tbl WHERE parent='0'");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function showCategories() {
        $query = $this->db->prepare("SELECT * FROM articlecat_tbl");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function showَCategory($id) {
        $query = $this->db->prepare("SELECT * FROM articlecat_tbl WHERE id='$id'");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function deleteCategory($id) {
        $query = $this->db->prepare("DELETE FROM articlecat_tbl WHERE id=$id");
        $query->execute();
    }
    
    public function updateCategory($id,$data) {
        $query = $this->db->prepare("UPDATE articlecat_tbl SET title='$data[title]',status='$data[status]',parent='$data[parent]' WHERE id='$id'");
        $query->execute();
    }

    // PRODUCTS

    public function addProduct($data,$to) {
        $query = $this->db->prepare("INSERT INTO products_tbl (name,description,details,price,status,image,discount,quantity,category) VALUES ('$data[name]','$data[desc]','$data[detail]','$data[price]','$data[status]','$to','$data[discount]','$data[quantity]','$data[category]')");
        $query->execute();
    }

    public function showَProducts() {
        $query = $this->db->prepare("SELECT * FROM products_tbl");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function showَProduct($id) {
        $query = $this->db->prepare("SELECT * FROM products_tbl WHERE id='$id'");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function updateProduct($id,$data,$to) {
        $query = $this->db->prepare("UPDATE products_tbl SET name='$data[name]',description='$data[desc]',details='$data[detail]',price='$data[price]',discount='$data[discount]',quantity='$data[quantity]',status='$data[status]',category='$data[category]',image='$to' WHERE id='$id'");
        $query->execute();
    }

    //  PRODUCT CATEGORY
        // FOR ADD
    public function addProductCat($prdcat)  {
        $query = $this->db->prepare("INSERT INTO productcat_tbl (title,parent,status) VALUES ('$prdcat[title]','$prdcat[parent]','$prdcat[status]')");
        $query->execute();
    }

    public function selectParentPrdCat() {
        $query = $this->db->prepare("SELECT * FROM productcat_tbl WHERE parent='0'");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

        // FOR LIST
    public function showProductCats() {
        $query = $this->db->prepare("SELECT * FROM productcat_tbl");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

        // FOR DELETE
    public function deleteProductCat($id) {
        $query = $this->db->prepare("DELETE FROM productcat_tbl WHERE id=$id");
        $query->execute();
    }

        // FOR EDIT
    public function showَProductCat($id) {
        $query = $this->db->prepare("SELECT * FROM productcat_tbl WHERE id='$id'");
        $query->execute();
        $result = $query->fetch();
        return $result;
    } 

    public function updateProductCat($id,$data) {
        $query = $this->db->prepare("UPDATE productcat_tbl SET title='$data[title]',status='$data[status]',parent='$data[parent]' WHERE id='$id'");
        $query->execute();
    }

    // SETTINGS

    public function showَSettings() {
        $query = $this->db->prepare("SELECT * FROM settings_tbl");
        $query->execute();
        $result = $query->fetch();
        return $result;
    } 

    public function updateSettings($data,$to) {
        $query = $this->db->prepare("UPDATE settings_tbl SET name='$data[name]',logo='$to',footertext='$data[footer]',products_per_page='$data[perprd]'");
        $query->execute();
    }
}
