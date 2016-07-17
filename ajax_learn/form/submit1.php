<?php
if($_POST)
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    //neu dang nhap dung
    if($username == '111111' && $password == '111111')
    {
?>
<table >
    <tr>
        <td colspan="2">Đăng nhập thành công</td>
    </tr>
    <tr>
        <td><strong>Xin chào:</strong> </td>
        <td><?php echo $username ?></td>
    </tr>
</table>
<?php
    }else{
        //neu dang nhap sai
        echo 'false';
    }
}
?>