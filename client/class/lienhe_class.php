<?php
require_once('../admin/database.php');
?>
<?php
class lienhe
{
    private $db;
    // Constructor để khởi tạo đối tượng kết nối
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insert_lh()
    {
        $fullName = $_POST['fullName'];
        $phoneNumber = $_POST['phoneNumber'];
        $emaillh = $_POST['emaillh'];
        $morett = $_POST['morett'];


        $query = "INSERT INTO lienhe (fullName, phoneNumber, emaillh, morett)
                  VALUES (' $fullName ', '$phoneNumber', '$emaillh', ' $morett ')";
        return $this->db->insert($query);
    }

    public function show_lh()
    {
        $query = "SELECT * FROM lienhe";
        $result = $this->db->select($query);
        return $result;
    }

   
}
?>