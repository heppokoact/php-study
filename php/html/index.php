<?php

echo 'Hello World<br>';

// hostname, user, password, db name
$mysqli = new mysqli('mysql', 'docker', 'docker', 'app');

if ($mysqli->connect_error) {
  echo $mysqli->connect_error;
  exit();
} else {
    $mysqli->set_charset("utf8");
}

$sql = "SELECT id, name FROM test";
if ($result = $mysqli->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        echo "ID:" . $row["id"] . " NAME:" . $row["name"] . "<br>";
    }
    $result->close();
}

$mysqli->close();

trait Ttt {
    public $ttt = "TTT";
}

class Hoge {
    use Ttt;
    public $aaa = "AAA";
    private $bbb = "BBB";
    protected $ccc = "CCC";
    public $ddd = "DDD";
    const EEE = "EEE";

    public function test1() {
        foreach($this as $key => $value) {
            echo "${key} => ${value}";
        }
    }
}
$hoge = new Hoge();
$hoge->test1();

foreach($hoge as $key => $value) {
    echo "${key} => ${value}";
}