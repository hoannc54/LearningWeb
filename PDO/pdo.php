<?php
/**
 * Created by PhpStorm.
 * User: conghoan
 * Date: 08/06/2016
 * Time: 09:22
 */

try {
    $conn = new PDO('mysql:host=localhost;dbname=hoannc006;charset=utf8', 'root', 'mysql@adminhoan');
}catch (PDOException $e){
    throw new Exception ('Khong kết nối được cơ sở dữ liệu.');
}

//Lấy dữ liệu từ 1 bảng.

//$sth = $conn->prepare('select * from users');
//$sth->execute();
//
//$result = $sth->fetchAll(PDO::FETCH_OBJ);
////var_dump($result);
////print_r($result[0]);
//
//print_r($result[0]->username) ;

//Lấy dữ liệu có điều kiện.
$sth = $conn->prepare('select id, username, email from users where username = :namea');
$sth->execute(array(
    ':namea' => 'anhdn'
));
$result = $sth->fetch(PDO::FETCH_ASSOC);
print_r($result);
echo $result->username;

//Cách 2:
//$sth = $conn->prepare('select id, username, email from users where username = :username');
//$sth->bindParam(':username', 'username', PDO::PARAM_STR);
//$sth->execute();
//$result = $sth->fetch(PDO::FETCH_OBJ);

/**
 * Insert dữ liệu.
*/

//$sth = $conn->prepare('insert into users(username, password, email) values(:username, :password, :email)');
//$sth->execute(array(
//    ':username' => 'hoannc6',
//    ':password' => md5('12345678'),
//    ':email' => 'hoannc6@gmail.com'
//));