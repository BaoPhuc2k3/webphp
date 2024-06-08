<?php
use PHPUnit\Framework\TestCase;

class connectDbTest extends TestCase
{
    private $conn;

    protected function setUp(): void
    {
        $this->conn = new mysqli('localhost', 'root', '', 'pj09qlhtk');
    }

    public function testConnectionEstablished()
    {
        $this->assertInstanceOf(mysqli::class, $this->conn, "Connection object is not an instance of mysqli");
    }

    public function testCharacterSet()
    {
        $this->assertInstanceOf(mysqli::class, $this->conn, "Connection is not an instance of mysqli");
        
        $charset = $this->conn->character_set_name();
        $this->assertEquals('utf8mb4', $charset, "Character set is not utf8");
    }

    public function testDatabaseSelection()
    {
        $this->assertInstanceOf(mysqli::class, $this->conn, "Connection is not an instance of mysqli");
        
        $selected_database = $this->conn->query("SELECT DATABASE()");
        $selected_database_name = $selected_database->fetch_row()[0];
        $this->assertEquals('pj09qlhtk', $selected_database_name, "Database selection failed");
    }
}
?>
