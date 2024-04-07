<?php
include "database.php";

class loaibv
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_loaibv($ten_loai, $loai_baiviet)
    {
        // Tạo câu truy vấn
        $query = "INSERT INTO loai_bv (ten_loai, loai_baiviet) VALUES ('$ten_loai', '$loai_baiviet')";

        // Gọi phương thức insert từ đối tượng Database và trả về kết quả
        return $this->db->insert($query);
    }


    public function show_loaibv()
    {
        $query = "SELECT * FROM loai_bv";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_loaibv($id_loai)
    {
        $query = "SELECT * FROM loai_bv WHERE id_loai ='$id_loai'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_loaibv($ten_loai, $loai_baiviet, $id_loai)
    {
        $update_fields = array();
        if (!empty($ten_loai)) {
            $update_fields[] = "ten_loai = '$ten_loai'";
        }
        if (!empty($loai_baiviet)) {
            $update_fields[] = "loai_baiviet = '$loai_baiviet'";
        }


        if (empty($update_fields)) {
            return false;
        }


        $update_query = "UPDATE loai_bv SET " . implode(", ", $update_fields) . " WHERE id_loai = '$id_loai'";
        $values = array($id_loai);
        $result = $this->db->update($update_query, $values);

        return $result;
    }

    public function del_loaibv($id_loai)
    {
        $query = "DELETE FROM loai_bv WHERE id_loai = '$id_loai'";
        $result = $this->db->delete($query);
        header('Location: update_loaibv.php');
        return $result;
    }
}
