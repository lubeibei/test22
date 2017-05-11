<!DOCTYPE html>
<!--
单点登录:SSO  single sign on 
百度登录:百度首页登录一次,百度音乐,百度地图就不用重复登录了
同一个域名,使用一个cookie
设置虚拟主机
1:
2:

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
                    <button id="checkLogin">验证登陆</button>
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
                var data = $(this).serialize();
                alert(data);
                $.ajax({
                    url: "login.php",
                    type: "POST",
                    data: data,
                    success: function (result) {
                        alert(result);
                    },
                });

                e.preventDefault();
            });
            $("#checkLogin").click(function () {
                
            });
            
            
    
    });
    </script>
</html>
