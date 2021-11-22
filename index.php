<?php
$getfile = file_get_contents('test.json');
$jsonfile = json_decode($getfile, true);
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
<div id="list"
        class="mui-container">
    <a class="mui-btn mui-btn--small mui-btn--primary"
            href="add.php">+ Добавить пользователя</a>
    <table class="wrapper mui-table mui-table--bordered"></table>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://pagination.js.org/dist/2.1.4/pagination.min.js"></script>
<script>
    async function loadUsers() {

        let response = await fetch('test.json');

        let json = await response.json();

        $('#list').pagination({
            dataSource: json.users,
            pageSize: 5,
            callback: function (data, pagination) {

                let wrapper = $('#list .wrapper').empty();

                wrapper.prepend('<thead>' +
                    '<tr>' +
                    '<th>Фамилия</th>' +
                    '<th>Имя</th>' +
                    ' <th>Отчество</th>' +
                    ' <th>Cкидка(%)</th>' +
                    ' <th></th>' +
                    ' <th></th>' +
                    '</tr>' +
                    '</thead>');

                wrapper.append('<tbody></tbody>');

                let x = 0;

                $.each(data, function (i, f) {

                    if (pagination.pageNumber == 1) {
                        x = i
                    } else if (pagination.pageNumber == 2) {
                        x = i + 5
                    }

                    $('#list .wrapper').append('<tr><td>' + f.firstN + '</td>'
                        + '<td>' + f.sername + '</td>' + '<td>' + f.lastName + '</td>' + '<td>' + f.procent + '</td>' + '<td><a class="mui-btn mui-btn--small mui-btn--primary" href="edit.php?id=' + x + '">Редактировать</a></td>' + '<td><a class="mui-btn mui-btn--small mui-btn--danger" href="delete.php?id=' + x + '">Удалить</a></td>' + '</tr>'
                    );
                });
            }
        });
    }

    loadUsers();
</script>