<?php


use PHPUnit\Framework\TestCase;

class XoaKhachHangTest extends TestCase
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

    public function testXoaKhachHangThanhCong()
    {
        // Giả lập id của khách hàng cần xóa
        $id_kh = 5;

        // Gọi hàm xóa khách hàng
        $sql = " DELETE FROM khachhang WHERE id_kh= $id_kh";
        $result = mysqli_query($this->conn, $sql);

        // Kiểm tra kết quả trả về
        $this->assertTrue($result);

        // Kiểm tra xem khách hàng đã được xóa thành công hay không
        $sql = "SELECT * FROM khachhang WHERE id_kh = $id_kh";
        $result = mysqli_query($this->conn, $sql);

        $this->assertEmpty(mysqli_fetch_assoc($result), "Khách hàng với ID $id_kh vẫn tồn tại sau khi xóa.");
    }

    public function testXoaKhachHangThatBai()
    {
        // Giả lập id của một khách hàng không tồn tại
        $id_kh = 9999;

        // Gọi hàm xóa khách hàng
        $sql = "DELETE FROM khachhang WHERE id_kh = $id_kh";
        $result = mysqli_query($this->conn, $sql);

        // Kiểm tra kết quả trả về
        $this->assertTrue($result, "Xóa khách hàng không tồn tại không nên thành công.");
    }
}
