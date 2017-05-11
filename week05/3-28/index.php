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
                <div class="col-md-6">
                    <button id="jsonBtn" class="btn btn-primary">通过php处理json数据</button>
                </div>
                <div class="col-md-6">
                    <button id="jsJsonBtn" class="btn btn-primary">通过js处理json数据</button>
                </div>
            </div>
        </div>
    </body>
    <script src="js/jquery-3.2.0.js"></script>
    <script>
        $(function () {
            $("#jsonBtn").click(function () {
                // $.get $.post $.ajax
                $.getJSON("json.php", null, function (data) {
                    // alert(data);

                    if (data.status == 1) {
                        var users = data.users;
                        users.forEach(function (value, key) {
                            console.log(value.name);
                        });
                    }
                });
            }); 

            // 参数1:events 事件名称
            // 参数2:selector 回调函数
            // 参数3:data 传递参数
            $("#jsJsonBtn").on("click", function () {
                // 1) 把js对象转为json字符串
                var jsObj = new Object();
                jsObj.name = "zhangSan";
                jsObj.age = 40;
                console.log(jsObj);

                var jsObj = {
                    "name": "zhangSan",
                    "age": 40,
                };
                console.log(jsObj);


                var user1 = {
                    "id": 1001,
                    "name": "zhangSan",
                    "head_img": "1.jpg",
                    "email": "123@qq.com",
                };
                var user2 = {
                    "id": 1002,
                    "name": "liSi",
                    "head_img": "2.jpg",
                    "email": "456@qq.com",
                };

                var returnData = {
                    "status": 1,
                    "users": [
                        user1,
                        user2,
                    ],
                };

                var jsonStr = JSON.stringify(returnData);
                alert(jsonStr);
                //2) 把json字符串转换为js对象
                var jsObj = JSON.parse(jsonStr);
                console.log(jsObj);
                // 总结:掌握JSON.stringify和JSON.parse
                //  JSON.parse更常用一些

                // 补充:将json字符串直接转化为js对象
                // eval:将字符串当做代码进行执行
                eval("var a = 3+5;console.log(a);");

                eval("var jsObj=" + jsonStr);
                console.log(jsObj);

            });
        });
    </script>
</html>
