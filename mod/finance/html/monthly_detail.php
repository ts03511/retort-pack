<!DOCTYPE html>
<head>
    <title>retort-pack</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/monthly_detail.css">
</head>

<!-- List of valiables.
	$db_connect -> Database connect instance.
	$db_host -> Database Host IP Address.
	$db_user -> Database User.
	$db_password -> Database User's Password.
	$db_name -> Database's Name.
	$get_master_sql -> SQL.
	$sql_result -> exec SQL Result.
	$pay_desc -> Selected payment information.
    $record_id -> uniq ID in pay_dest_list. it userd by update_2.php for parse post data.
-->

    <body>
        <?php
            require './common/connect_to_db.php';
        ?>

        <div id="master">
            <form id="period_select_aria" action="./monthly_detail.php" method="POST">
                <select name="date">
                    <?php

                        $get_period_sql =
                            'SELECT 
                                DISTINCT(
                                    SUBSTRING_INDEX(pay_date,"-",2)
                                ) AS period 
                            FROM 
                                payment_history
                            ORDER BY
                                period'
                        ;

                        if ($sql_result = $db_connect->query($get_period_sql)) {
                            while ($period_list = $sql_result->fetch_assoc()){
                                print "<option value=\"" . $period_list['period'] . ">" . $period_list['period'] . "</option>";
                            };
                        };
                    ?>
                </select>
                <input type="submit" value="表示">
            </form>
            
            <input id="back_btn_head" type="button" value="戻る" onClick="location.href='../index.html'">

            <?php
                $get_sum_sql =
                    'SELECT SUM(
                        pay_value
                     ) AS pay_sum
                     FROM
                        payment_history
                     WHERE
                        pay_date
                     LIKE ' . "\"" .
                        $_POST["date"].'%' .
                     "\""
                ;
                
                $sql_result = $db_connect->query($get_sum_sql);
                $pay_summary = $sql_result->fetch_assoc();
                if ($_POST["date"]) {
                    print "<div id=\"monthly_summary_aria\">" . $_POST["date"] . ": " . $pay_summary['pay_sum'] . " 円" . "</div>";

                    print "<table>";
                    print "<tr>";
                    print "<th>日付</th>";
                    print "<th>支払先</th>";
                    print "<th>費目</th>";
                    print "<th>金額</th>";
                    print "</tr>";

                    $get_history_sql = 
                        'SELECT 
                            payment_history.pay_date, 
                            payment_history.pay_dest, 
                            pay_dest_list.pay_type,
                            payment_history.pay_value
                        FROM
                            payment_history
                        INNER JOIN
                            pay_dest_list
                        ON
                            payment_history.pay_dest = pay_dest_list.pay_dest
                        WHERE 
                            payment_history.pay_date
                        LIKE' . "\"" .
                            $_POST["date"].'%'
                        . "\""
                    ;

                    if ($sql_result = $db_connect->query($get_history_sql)) {
                        while ($pay_desc = $sql_result->fetch_assoc()){
                            print "<tr>\n";
                            print "<td>{$pay_desc['pay_date']}</td>\n";
                            print "<td>{$pay_desc['pay_dest']}</td>\n";
                            print "<td>{$pay_desc['pay_type']}</td>\n";
                            print "<td>{$pay_desc['pay_value']}</td>\n";
                            print "</tr>\n\n";
                        };
		                print "</table>";
                    };
                    $db_connect->close();
                };
            ?>

			<br><br>
		</div>
	</body>
</html>
