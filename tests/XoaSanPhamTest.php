<?php

use PHPUnit\Framework\TestCase;

class XoaSanPhamTest extends TestCase
{
    private $conn;

    public function setUp(): void
    {
        // Thiết lập kết nối với cơ sở dữ liệu
        $this->conn = mysqli_connect('localhost', 'root', '', 'pj09qlhtk');

       
    }

    public function tearDown(): void
    {
        // Đóng kết nối với cơ sở dữ liệu
        mysqli_close($this->conn);
    }

    public function testXoaSanPham()
    {
        // Giả lập id của sản phẩm cần xóa
        $id_sp = 1;

        

        // Kiểm tra xem sản phẩm có bị xóa khỏi cơ sở dữ liệu không
        $sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
        $result = mysqli_query($this->conn, $sql);

        $this->assertEmpty(mysqli_fetch_assoc($result), "Sản phẩm với ID 1 vẫn tồn tại sau khi xóa.");

        
    }
}
?>
