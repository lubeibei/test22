<!doctype html>
<html lang="en">
    <head>
        <title>title</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-center">欢迎登陆</h1>
                    <form enctype="multipart/form-data">
                        <div class="form-group">
                            <label>用户手机</label>
                            <input type="text" name="phone" class="form-control" id="" placeholder="请输入手机号">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">用户密码</label>
                            <input type="password" name="psw" class="form-control" id="exampleInputPassword1" placeholder="请输入用户密码">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">头像</label>
                            <input type="file" name="head_img" id="exampleInputFile">
                            <p class="help-block">选择一张用户头像上传</p>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="autologin" type="checkbox"> 七天内自动登陆
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">登陆</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="js/jquery-3.2.0.js"></script>
    <script>
        $(function () {
            $("form").submit(function (e) {
                $.ajax({
                    url: "loginServer.php",
                    type: "post",
                    data: $(this).serialize(),
                    success: function (data) {
                        alert(data);
                        data = JSON.parse(data);
                        if (data.status == 0) {
                            alert(data.msg);
                        } else if (data.status == 1) {
                            alert(data.msg);
                        } else if (data.status == 2) {
                            // 跳转到首页/个人设置/.....
                            alert(data.info.vip_level);
                        }
                    },
                });
                e.preventDefault();
            });
        });
    </script>
</html>
