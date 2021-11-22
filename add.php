<?php
if (isset($_POST["add"])) {
    $file = file_get_contents('test.json');
    $data = json_decode($file, true);
    unset($_POST["add"]);
    $data["users"] = array_values($data["users"]);
    array_push($data["users"], $_POST);
    file_put_contents("test.json", json_encode($data, JSON_UNESCAPED_UNICODE));
    header("Location: index.php");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"
            content="IE=edge">
    <meta name="viewport"
            content="width=device-width, initial-scale=1">
    <link href="//cdn.muicss.com/mui-0.10.3/css/mui.min.css"
            rel="stylesheet"
            type="text/css"/>
    <link href="//pagination.js.org/dist/2.1.4/pagination.css"
            rel="stylesheet"
            type="text/css"/>
    <script src="//cdn.muicss.com/mui-0.10.3/js/mui.min.js"></script>
</head>
<div class="mui-panel"></div>
<div class="mui-container">
    <form class="mui-form"
            action="add.php"
            method="POST">
        <div class="mui-textfield">
            <input type="text"
                    name="firstN"
                    placeholder="Фамилия"/>
        </div>
        <div class="mui-textfield"><input type="text"
                    name="sername"
                    placeholder="Имя"/></div>
        <div class="mui-textfield"><input type="text"
                    name="lastName"
                    placeholder="Отчество"/></div>
        <div class="mui-textfield"><input type="text"
                    name="procent"
                    placeholder="Процент скидки"/></div>
        <input class="mui-btn mui-btn--small mui-btn--primary"
                type="submit"
                name="add"
                value="Добавить"/>
        <a href="/jsoncrud/"
                class="mui-btn mui-btn--small mui-btn--primary">на главную</a>
    </form>
</div>
