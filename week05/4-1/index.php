<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <img src="code.php" alt="验证码错误">
        <input type="text" name="code"><br>
        <div id="result"></div>
    </body>
    <script src="jquery-3.2.0.js"></script>
    <script>
        $(function () {
            $("[name='code']").blur(function () {
                $.ajax({
                    url: "code.php",
                    type: "post",
                    data: {
                        'code': $(this).val(),
                    },
                    success: function (data) {
                        if (data.status == 1) {
//                           保证 元素只创建一次
//                                验证成则找到div
                            $("#result").html("<form method='podt' action='thumb.php' enctype='multipart/form-data'>\n\
               <input type='file' name='img'><button type='submit'>生成缩略图</form></form>");    
                                                    
                        } else {
                            
                        }
                    },
                    dataType: 'json',
                });
            });
        });


    </script>
</html>

