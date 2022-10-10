<?php
class Admin {
    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function loginCheck($data) {
        $query = $this->db->prepare("SELECT * FROM admin_tbl WHERE username='$data[uname]'");
        $query->execute();
        $result = $query->fetch();
        if ($result != null) {
            if ($result['password'] === sha1($data['pwd'])) {
                $_SESSION['name'] = $result['name'];
                header('location:/admin/');
            } else {
                $_SESSION['error'] = "password";
                header('location:/login/');
            }
        }
    }
}