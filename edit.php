<?php
if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $getfile = file_get_contents('test.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["users"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int)$_POST["id"];
    $getfile = file_get_contents('test.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["users"];
    $jsonfile = $jsonfile[$id];

    $post["firstN"] = isset($_POST["firstN"]) ? $_POST["firstN"] : "";
    $post["sername"] = isset($_POST["sername"]) ? $_POST["sername"] : "";
    $post["lastName"] = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
    $post["procent"] = isset($_POST["procent"]) ? $_POST["procent"] : "";


    if ($jsonfile) {
        unset($all["users"][$id]);
        $all["users"][$id] = $post;
        $all["users"] = array_values($all["users"]);
        file_put_contents("test.json", json_encode($all, JSON_UNESCAPED_UNICODE));
    }
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
    <?php if (isset($_GET["id"])): ?>
        <form class="mui-form"
                action="edit.php"
                method="POST">
            <input type="hidden"
                        value="<?php echo $id ?>"
                        name="id"/>

            <div class="mui-textfield"><input type="text"
                        value="<?php echo $jsonfile["firstN"] ?>"
                        name="firstN"/></div>
            <div class="mui-textfield"><input type="text"
                        value="<?php echo $jsonfile["sername"] ?>"
                        name="sername"/></div>
            <div class="mui-textfield"><input type="text"
                        value="<?php echo $jsonfile["lastName"] ?>"
                        name="lastName"/></div>
            <div class="mui-textfield"><input type="text"
                        value="<?php echo $jsonfile["procent"] ?>"
                        name="procent"/></div>

            <input class="mui-btn mui-btn--small mui-btn--primary" type="submit" value="добавить"/>
            <a href="/jsoncrud/"
                    class="mui-btn mui-btn--small mui-btn--primary">на главную</a>
        </form>
    <?php endif; ?>
</div>
