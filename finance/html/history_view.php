<!DOCTYPE html>
<head>
    <title>retort-pack</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
</head>

    <body>
        <?php
            require './common/connect_to_db.php';
        ?>

        <div id="master">
            <table>
                <tr>
                    <th>ID</th>
                    <th>日付</th>
                    <th>種別</th>
                    <th>金額</th>
                </tr>

                <?php
                    $history_sql = 'SELECT * FROM finance_hisory;';
                    require './common/get_history.php';
                    $db_connect->close();
                ?>
            </table>
        </div>
    </body>
</html>
