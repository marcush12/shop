<?php

include_once '../lib/Database.php';
include_once '../helpers/Format.php';

class Brand {

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function brandInsert($brandName) {
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        if (empty($brandName)) {
            $msg = "O campos para a marca não ficar ser em branco";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_brand(brandName) VALUES ('$brandName')";
            $brandinsert = $this->db->insert($query);
            if ($brandinsert) {
                $msg ="<span class='success'>Marca inserida com sucesso</span>";
                return $msg;
            } else {
               $msg ="<span class='error'>Marca não foi inserida</span>";
               return $msg;
            }
        }
    }

    public function getAllBrand() {
        $query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getUpdatedById($id) {
        $query = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function brandUpdate($brandName, $id) {
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($brandName)) {
            $msg = "<span class='error'>O campo da Marca não pode ficar em branco</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId ='$id'";
            $update_row = $this->db->update($query);
            if ($update_row) {
                $msg = "<span class='success'>Nome da Marca foi atualizado com sucesso</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Nome da Marca não foi atualizado</span>";
                return $msg;
            }
        }
    }

    public function delBrandById($id) {
        $query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
        $branddeldata = $this->db->delete($query);
        if ($branddeldata) {
            $msg = "<span class='success'>A Marca foi removida com sucesso</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>A Marca não foi removida</span>";
            return $msg;
        }
    }

}
?>
