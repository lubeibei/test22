<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
    <id class="container">
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
            </div>
        </div>    
    </id>
    </body>
    <script src="js/jquery-3.2.0.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
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
