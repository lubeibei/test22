<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   <form method="POST" id="a">
                        <div class="form-group">
                            <label>用户名</label>
                            <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入用户名">
                        </div>
                        <div class="form-group">
                            <label>用户密码</label>
                            <input name="psw" type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码">
                        </div>

                        <div class="checkbox">
                            <label>
                                <input name="autologin" type="checkbox"> 七天内自动登陆
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">登陆</button>
                    </form>
                    <button id="checkLogin">验证登陆</button>-->
                </div>
            </div>
        </div>
    </body>
    <script src="js/jquery-3.2.0.js"></script>
    <script src="js/bootstrap.js"></script>
    <!--1. 重写表单的submit方法-->
    <!--target:目标, 当前调用该事件的元素-->
    <!--prevent:阻止-->
    <!--default:默认-->
    <script>
        $(function () {
            $("form").submit(function (e) {
                // e.target  == $(this)
                // serialize:序列化:.serialize() 方法创建以标准 URL 编码表示的文本字符串。
                // 它的操作对象是代表表单元素集合的 jQuery 对象。
                var data = $(this).serialize();
                $.ajax({
                    url: "login1.php",
                    type: "POST",
                    data: data,
                    success: function (result) {
                        // 登陆成功后自动跳转
                        // window
                        // location:定位,位置
                        window.location.href =  "index.php";
                    },
                });
                e.preventDefault();//防止页面刷新
            });
        });
    </script>
</html>
