<?php
include_once '../lib/Database.php';
include_once '../helpers/Format.php';



class Product {

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function productInsert($data, $file) {//renamed $_POST, $_FILES easier to read
        $productName = $this->fm->validation($data['productName']);
        $catId = $this->fm->validation($data['catId']);
        $brandId = $this->fm->validation($data['brandId']);
        $body = $this->fm->validation($data['body']);
        $price = $this->fm->validation($data['price']);
        $type = $this->fm->validation($data['type']);

        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $catId = mysqli_real_escape_string($this->db->link, $data['catId']);
        $brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
        $body = mysqli_real_escape_string($this->db->link, $data['body']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);

        $permited = array('jpg', 'png', 'jpeg', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div)); //extensão
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/". $unique_image;

        if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "") {
            $msg ="<span class='error'>Os campos não podem ficar em branco</span>";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName, catId, brandId, body, price, image, type)
                                      VALUES ('$productName', '$catId', '$brandId', '$body', '$price', '$uploaded_image', '$type')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $msg ="<span class='success'>Produto inserido com sucesso</span>";
                return $msg;
            } else {
               $msg ="<span class='error'>Produto não foi inserido</span>";
               return $msg;
            }
        }
    }

}
?>
