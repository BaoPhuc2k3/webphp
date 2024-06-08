<?php

use PHPUnit\Framework\TestCase;

class XoaLoaiSPTest extends TestCase
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

    public function testXoaLoaiSanPhamThanhCong()
    {
        // Giả lập id của loại sản phẩm cần xóa
        $id_loai_sp = 5;

        // Gọi hàm xóa loại sản phẩm
        $sql = "DELETE FROM loaisanpham WHERE id_loai_sp = $id_loai_sp";
        $result = mysqli_query($this->conn, $sql);

        // Kiểm tra kết quả trả về
        $this->assertTrue($result);

        // Kiểm tra xem loại sản phẩm đã được xóa thành công hay không
        $sql = "SELECT * FROM loaisanpham WHERE id_loai_sp = $id_loai_sp";
        $result = mysqli_query($this->conn, $sql);

        $this->assertEmpty(mysqli_fetch_assoc($result), "Loại sản phẩm với ID $id_loai_sp vẫn tồn tại sau khi xóa.");
    }

    // public function testXoaLoaiSanPhamThatBai()
    // {
    //     // Giả lập id của một loại sản phẩm không tồn tại
    //     $id_loai_sp = 9999;

    //     // Gọi hàm xóa loại sản phẩm
    //     $sql = "DELETE FROM loaisanpham WHERE id_loai_sp = $id_loai_sp";
    //     $result = mysqli_query($this->conn, $sql);

    //     // Kiểm tra kết quả trả về
    //     $this->assertFalse($result, "Xóa loại sản phẩm không tồn tại không nên thành công.");
    // }
}
