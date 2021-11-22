<?php

if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $all = file_get_contents('test.json');
    $all = json_decode($all, true);
    $jsonfile = $all["users"];
    $jsonfile = $jsonfile[$id];

    if ($jsonfile) {
        unset($all["users"][$id]);
        $all["users"] = array_values($all["users"]);
        file_put_contents("test.json", json_encode($all));
    }
    header("Location: index.php");
}