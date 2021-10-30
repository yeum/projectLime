<?php
echo 'project LIME!'."<br>"."<br>";
$host = "localhost";
$user = "root";
$pw = "password";
$dbName = "game";

try{
    $config = include('./config.php');

    $conn = new PDO($config['dsn'], $config['dbUserName'], $config['dbPassword']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    /* SELECT 예제 */
    $sql = "SELECT * FROM `TB_USER`";
    $result = $conn->prepare($sql);
    $result->execute();

    echo "[DB TEST START]"."<br>";
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        echo "user_id: " . $row['user_id'] . ", nickname: " . $row['nickname'] . "<br>";
    }
} catch(PDOException $e) {
    die( 'MySQL 연결실패 : ' . $e->getMessage());
}
?>