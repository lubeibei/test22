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
                    <?php if (!isset($_COOKIE['username'])): ?>
                        <ul class="nav nav-pills">
                            <li role="presentation" class=""><a href="loginUI.php">登陆</a></li>
                            <li role="presentation" class=""><a href="#">注册</a></li>
                        </ul>
                    <?php else: ?>
                        <h1>欢迎<?php echo $_COOKIE['username']; ?>登陆</h1>
                        <button id="logoutBtn" class="btn btn-danger">退出</button>
                    <?php endif; ?> 
                    <br>
<!--                    <button onclick="setCookie('jsname', 'javascript', 3);" class="btn btn-primary">通过js设置cookie</button>
                    <button onclick="getCookie('jsname');" class="btn btn-primary">通过js获取cookie</button>
                    <button onclick="delCookie('jsname');" class="btn btn-primary">通过js删除cookie</button>-->
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
//                        function setCookie(cname, cvalue, exdays) {
//                            var d = new Date();
//                            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
//                            var expires = "expires=" + d.toUTCString();
//                            document.cookie = cname + "=" + cvalue + "; " + expires;
//                        }

//                        function getCookie(cname) {
//                            var name = cname + "=";
//                            var ca = document.cookie.split(';');
//                            for (var i = 0; i < ca.length; i++) {
//                                var c = ca[i].trim();
//                                if (c.indexOf(name) == 0) {
//                                    console.log(c.substring(name.length, c.length));
//                                    return c.substring(name.length, c.length);
//                                }
//                            }
//                            return "";
//                        }
//                        function delCookie(name) {
//                            var expTime = new Date();
//                            expTime.setTime(expTime.getTime() - 10000);
//                            var cookieValue = getCookie(name);
//                            alert(cookieValue);
//                            if (cookieValue != null) {
//                                document.cookie = name + "=" + cookieValue + ";expires=" + expTime.ToUTCString();
//                            }
//
//                        }
//
                        $(function () {
                            $("#logoutBtn").click(function () {
                                // 删除cookie中的username并且刷新首页
                                $.ajax({
                                    url: "login1.php?ac=logout",
                                    type: "GET",
                                    success: function (result) {
                                        window.location.href = "index.php";
                                    },
                                });
                            });

                        });
    </script>
</html>
