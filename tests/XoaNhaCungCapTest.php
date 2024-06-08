<?php

use PHPUnit\Framework\TestCase;

class XoaNhaCungCapTest extends TestCase
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

    public function testXoaNhaCungCapThanhCong()
    {
        // Giả lập id của nhà cung cấp cần xóa
        $id_nha_cc = 5;

        // Gọi hàm xóa nhà cung cấp
        $sql = "DELETE FROM nhacungcap WHERE id_nha_cc = $id_nha_cc";
        $result = mysqli_query($this->conn, $sql);

        // Kiểm tra kết quả trả về
        $this->assertTrue($result);

        // Kiểm tra xem nhà cung cấp đã được xóa thành công hay không
        $sql = "SELECT * FROM nhacungcap WHERE id_nha_cc = $id_nha_cc";
        $result = mysqli_query($this->conn, $sql);

        $this->assertEmpty(mysqli_fetch_assoc($result), "Nhà cung cấp với ID $id_nha_cc vẫn tồn tại sau khi xóa.");
    }

    // public function testXoaNhaCungCapThatBai()
    // {
    //     // Giả lập id của một nhà cung cấp không tồn tại
    //     $id_nha_cc = 9999;

    //     // Gọi hàm xóa nhà cung cấp
    //     $sql = "DELETE FROM nhacungcap WHERE id_nha_cc = $id_nha_cc";
    //     $result = mysqli_query($this->conn, $sql);

    //     // Kiểm tra kết quả trả về
    //     $this->assertFalse($result, "Xóa nhà cung cấp không tồn tại không nên thành công.");
    // }
}
