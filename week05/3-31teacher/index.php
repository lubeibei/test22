
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <img id="codeImg" src="code.php?type=1" alt="验证码">
        <input type="text" name="code">
        <button id="checkBtn">验证是否正确</button>
<!--        <img src="code.php?type=2" alt="验证码">
        <img src="code.php?type=3" alt="验证码">-->
    </body>
    <script src="jquery-3.2.0.js"></script>
    <script>
        $(function () {
            $("#codeImg").click(function () {
                $("#codeImg").attr("src", "code.php?type=1&rand=" + Math.random());
            });

            // 一个网页中一般只有一个验证码.
            $("#checkBtn").click(function () {
                $.ajax({
                    url: "code.php",
                    type: "post",
                    data: {
                        "code": $("[name='code']").val(),
                    },
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (result.status == '1') {
                            alert("OK");
                        } else {
                            alert("NO");
                            $("#codeImg").attr("src", "code.php?type=1&rand=" + Math.random());
                            $("[name='code']").val("");
                        }
                    },
                });
            });
        });
    </script>
</html>
