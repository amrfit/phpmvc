<?php 

class Main {
    private $controller;
    private $total = null;
    public $connect;

    public function setController($controller) {
        if ($controller != null) {
            $this->controller = $controller;
        } else {
            $this->controller = "index";
        }
    }

    public function getController() {
        return $this->controller;
    }

    public function __construct() {
        global $db;
        $this->db = $db;
        $this->connect = mysqli_connect('localhost','root','','khoroosino');
    }

    public function getSettings() {
        $query = $this->db->prepare("SELECT * FROM settings_tbl");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }

    public function showQuantityPrd($id) {
        $query = $this->db->prepare("SELECT id,quantity FROM products_tbl WHERE id='$id'");
        $query->execute();
        $result = $query->fetch();
        if ($result == null) {
            echo "محصولی وجود ندارد";
        } else {
            return $result;
        }
    }

    public function cart() {
        $carthtml ='
        <tr>
            <th colspan="9"><h1>سبد خرید</h1></th>
        </tr>
        <tr>
            <th>عکس محصول</th>
            <th>نام محصول</th>
            <th>تخفیف</th>
            <th>قیمت</th>
            <th>کاستن</th>
            <th>تعداد</th>
            <th>افزودن</th>
            <th>مجموع</th>
            <th>حذف</th>
        </tr>
        ';
        foreach ($_SESSION as $name => $value) :
            if ($value > 0) {
                if (substr($name,0,5) === 'cart_') {
                    $id = substr($name,5,strlen($name)-5);
                    $query = $this->db->prepare("SELECT id, name, description, price, image, discount FROM products_tbl WHERE id='$id' ORDER BY id DESC");
                    $query->execute();
                    while($cart = $query->fetch()){
                        $price = ($cart['price']/100)*(100-$cart['discount']);
                        @$sub = $price*$value ? $price*$value: null;
                        $carthtml .= '
                        <tr>
                            <td><img src="/'.$cart['image'].'" alt=""></td>
                            <td>'.$cart['name'].'</td>
                            <td>'.$cart['discount']."%".'</td>
                            <td>'.number_format($price).'</td>
                            <div id="cartitem'.$cart['id'].'">
                                <input type="hidden" name="prdid" value="'.$cart['id'].'">
                                <td><button class="linkarea" name="btnprdremove" type="submit" onclick="SubCart('.$cart['id'].')">-</button></td>
                                <td>'.$value.'</td>
                                <td><button class="linkarea" name="btnprdadd" type="submit" onclick="AddToCart('.$cart['id'].')">+</button></td>
                                <td>'.number_format($sub).'</td>
                                <td><button class="linkarea" name="btnprddelete" type="submit" onclick="DeleteCart('.$cart['id'].')"><i class="krs-trash"></i></button></td>
                            </div>
                        </tr>
                        ';
                    }
                    $this->total+=@$sub ? $sub: "0";
                }
            }
        endforeach;
        if ($this->total == 0) {
            $carthtml .= '
            <tr>
                <td colspan="8">هیچ محصولی درسبد خرید وجود ندارد.</td>
            </tr>';
        }
        $carthtml.='
        <tr>
            <td colspan="9">
                <div class="total_price">
                    مبلغ قابل پرداخت :
                    '.number_format($this->total)." تومان".'
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="9"><button class="checkout_btn">پرداخت</button></td>
        </tr>
        ';
        echo $carthtml;
    }

    // USER ACCOUNT

    public function addUser($data) {
        $query = $this->db->prepare("INSERT INTO users_tbl (name,lastname,email,password) VALUES ('$data[name]','$data[lname]','$data[email]',sha1('$data[pwd]'))");
        $query->execute();
        $this->loginUser($data);
    }

    public function loginUser($data) {
        $query = $this->db->prepare("SELECT * FROM users_tbl WHERE email='$data[email]'");
        $query->execute();
        $result = $query->fetch();
        if ($result != null) {
            if ($result['password'] === sha1($data['pwd'])) {
                $_SESSION['login'] = $result['name'];
                header('location:/index/');
            } else {
                header('location:/index/');
            }
        }
    }

    // LIKE 
    public function like() {
        global $number;
        $table = '
        <tr>
        <th colspan="8"><h1>علاقه مندی ها</h1></th>
        </tr>
        <tr>
            <th>ردیف</th>
            <th>عکس پست</th>
            <th>نام پست</th>
            <th>حذف از علاقه مندی</th>
        </tr>';
        foreach ($_SESSION as $name => $value) :
            if ($value > 0) {
                if (substr($name,0,5) === 'like_') {
                    $id = substr($name,5,strlen($name)-5);
                    $query = "SELECT * FROM article_tbl WHERE id='$id'";
                    $row = mysqli_query($this->connect,$query);
                    while($value = mysqli_fetch_assoc($row)){
                        $table .= '
                        <tr>
                            <th>'.$number.'</th>
                            <td><img src="/'.$value['image'].'" alt=""></td>
                            <td><a href="/article/'.$value['id'].'/">'.$value['name'].'</a></td>
                            <td>
                                <div id="dislikedpost'.$value['id'].'">
                                    <input type="hidden" name="artid" value="'.$value['id'].'" id="likeid">
                                    <button name="disliked" type="submit" class="clear_link" id="dislikebtn" onclick="RemoveLikePost('.$value['id'].')">
                                    <i class="krs-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        ';
                        $number++;
                    }
                }
            }
        endforeach;
        if ($number == 1) {
            $table .= '
            <tr>
                <td colspan="8">هیچ پستی در لیست علاقه مندی وجود ندارد.</td>
            </tr>';
        }
        echo $table;
    }

    
    // DATE AND TIME
    public function getTime($timestamp) {
        date_default_timezone_set("Asia/Tehran");
        $time_ago = strtotime($timestamp);
        $corrent_time = time();
        $time_difference = $corrent_time - $time_ago;
        $seconds    = $time_difference;
        $minutes    = round($seconds / 60);
        $hours      = round($minutes / 60);
        $days       = round($hours / 24);
        $weeks      = round($days / 7);
        $months     = round($days / 30);
        $years      = round($months / 12);
        if ($seconds <= 60) {
            return "همین الان";
        }

        if ($minutes <= 60) {
            if ($minutes == 1){
                return "یک دقیقه پیش";
            } else {
                return "$minutes دقیقه پیش";
            }
        }

        if ($hours <= 24) {
            if ($hours == 1){
                return "یک ساعت پیش";
            } else {
                return "$hours ساعت پیش";
            }
        }

        if ($days <= 7) {
            if ($days == 1){
                return "دیروز";
            } else {
                return "$days روز پیش";
            }
        }

        if ($weeks <= 4.3) {
            if ($weeks == 1){
                return "هفته گذشته";
            } else {
                return "$weeks هفته پیش";
            }
        }

        if ($months <= 12) {
            if ($months == 1){
                return "ماه گذشته";
            } else {
                return "$months ماه پیش";
            }
        }

        if ($years <= 12) {
            if ($years == 1){
                return "سال گذشته";
            } else {
                return "$years سال پیش";
            }
        }
    }

    public function searchData() {
        if (isset($_POST['input'])) {
            $name = $_POST['input'];
            $conn = mysqli_connect('localhost',"root","","khoroosino") or die("connnection failed");
            $query = "SELECT * FROM products_tbl WHERE name LIKE '%$name%' ORDER BY id LIMIT 3";
            $row = mysqli_query($conn,$query);
            while ($resultprd = mysqli_fetch_assoc($row)) {
                echo "<li>"."<a href='/product/".$resultprd['id']."'><img src='/".$resultprd['image']."' />".$resultprd['name']."</a>"."</li>";
            }
            $query1 = "SELECT * FROM article_tbl WHERE name LIKE '%$name%' ORDER BY id LIMIT 3";
            $row1 = mysqli_query($conn,$query1);
            while ($resultart = mysqli_fetch_assoc($row1)) {
                echo "<li>"."<a href='/article/".$resultart['id']."'><img src='/".$resultart['image']."' />".$resultart['name']."</a>"."</li>";
            }
            die();
        }
    }

    public function showProductCatParent () {
        $query = $this->db->prepare("SELECT * FROM productcat_tbl WHERE status='1' AND parent='0'");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function showProductCat () {
        $query = $this->db->prepare("SELECT * FROM productcat_tbl WHERE status='1' AND parent!='0'");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function showArticleCatParent () {
        $query = $this->db->prepare("SELECT * FROM articlecat_tbl WHERE status='1' AND parent='0'");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function showArticleCat () {
        $query = $this->db->prepare("SELECT * FROM articlecat_tbl WHERE status='1' AND parent!='0'");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

}


