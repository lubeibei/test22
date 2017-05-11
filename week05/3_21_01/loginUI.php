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
                    <?php   if(isset(!$_COOKIE['username'])):?>
                    <?php else:?>
                    <h1>欢迎<?php echo $_COOKIE['username'];?></h1>
                    <button id="logoutBtn" class="btn btn-danger">退出</button>
                    <?php endif;?>
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
                        <button type="submit" class="btn btn-default"><a href="loginUI.php">登陆</a></button>
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
            $("#logoutBth").click(function(){
//                删除cookie中的username并且刷新我那工业首页
//不传数据的话,get和post一样,get简单些
             $.ajax({
//                 直接在网址后面加参数
                 url:"login1.php?ac=logout",
                 type:"get",
                 
             });
            });
        });
    </script>
</html>
