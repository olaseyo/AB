<?php
include('TestBase.php');
use App\Models\User;
use App\Models\Database;
class UserTest extends \PHPUnit\Framework\TestCase
{
   private static $dbh;

    public static function setUpBeforeClass(): void
    {
        parent::setUp();
        //self::$dbh = new PDO('sqlite::memory:');
        //$pdo = m::mock(PDO::class);
    }

    public static function tearDownAfterClass(): void
    {

    }
 public function test(){
    $fakePdo = Mockery::mock(\PDO::class);
    $statement = Mockery::mock(\PDOStatement::class);
    $fakePdo->shouldReceive('query')->with('SELECT 1 FROM model LIMIT 1')->andReturn($statement);
    $fakePdo->shouldReceive('prepare')->with('DELETE FROM model WHERE id= 7')->andReturn($this->statement);
    $statement->shouldReceive('execute');
    $statement->shouldReceive('rowCount')->andReturn(0);
    $user = new User();
    $user->database->connect=$fakePdo;
    $this->assertEquals(25, $user->getUsers());
   }
}

?>