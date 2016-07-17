<form method="post" id="form_login">
    <table>
        <tr>
            <td>
                <input type="text" name="username" id="username" placeholder="Tài khoản" />
            </td>
        </tr>
        <tr>
            <td>
                 <input type="text" name="password" id="password" placeholder="Mật khẩu" />
            </td>
        </tr>
        <tr>
            <td align="center">
                 <button id="button_login" type="submit">Login</button>
            </td>
        </tr>
    </table>
</form>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript">

$(document).ready(function()
{  
    //khai báo nút submit form
    var submit   = $("button[type='submit']");
     
    //khi thực hiện kích vào nút Login
    submit.click(function()
    {
        //khai báo các biến
        var username = $("input[name='username']").val(); //lấy giá trị input tài khoản
        var password = $("input[name='password']").val(); //lấy giá trị input mật khẩu
         
        //kiem tra xem da nhap tai khoan chua
        if(username == ''){
            alert('Vui lòng nhập tài khoản');
            return false;
        }
         
        //kiem tra xem da nhap mat khau chua
        if(password == ''){
            alert('Vui lòng nhập mật khẩu');
            return false;
        }
         
        //lay tat ca du lieu trong form login
        var data = $('form#form_login').serialize();
        //su dung ham $.ajax()
        $.ajax({
        type : 'POST', //kiểu post
        url  : 'submit1.php', //gửi dữ liệu sang trang submit.php
        data : data,
        success :  function(data)
               {                       
                    if(data == 'false')
                    {
                        alert('Sai tên hoặc mật khẩu');
                    }else{
                        $('#content').html(data);
                    }
               }
        });
        return false;
    });
});
</script>
