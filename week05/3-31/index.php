
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <img id="codeImg" src="code.php?type=1" alt="验证码">
        <input id="input_code" type="text" name="code">
        <label id="checkBtn" >请输入正确的验证码!</label>    
        
<!--    <img src="code.php?type=2" alt="验证码">
        <img src="code.php?type=3" alt="验证码">-->
    </body>
    <script src="js/jquery-3.2.0.js" type="text/javascript"></script>
    <script>
        $(function () {
            $("#codeImg").click(function () {
                $("#codeImg").attr("src", "code.php?type=1&rand=" + Math.random());
            });
            $("#input_code").blur(function() {
                $.ajax({
                    url: "code.php",
                    type: "post",
                    data: {
                        code: $("[name='code']").val(),
                    },
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status == '1') {
//                            alert("OK");
                         $("#checkBtn").html("验证码输入正确!");                         
                        } else {
//                            alert("NO");
                            $("#checkBtn").html("验证码输入错误!");
                            $("#codeImg").attr("src", "code.php?type=1&rand=" + Math.random());
                            $("[name='code']").val("");
                        }
                    },                 
                });
            });
        });
    </script>
</html>
