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
            <form action="./monthly_detail.php" method="POST">
                <select name="date">
                    <option value="2022-07">2022年7月</option>
                    <option value="2022-08">2022年8月</option>
                    <option value="2022-09">2022年9月</option>
                    <option value="2022-10">2022年10月</option>
                    <option value="2022-11">2022年11月</option>
                    <option value="2022-12">2022年12月</option>
                    <option value="2023-01">2023年1月</option>
                    <option value="2023-02">2023年2月</option>
                    <option value="2023-03">2023年3月</option>
                    <option value="2023-04">2023年4月</option>
                    <option value="2023-05">2023年5月</option>
                    <option value="2023-06">2023年6月</option>
                    <option value="2023-07">2023年7月</option>
                    <option value="2023-08">2023年8月</option>
                    <option value="2023-09">2023年9月</option>
                    <option value="2023-10">2023年10月</option>
                    <option value="2023-11">2023年11月</option>
                    <option value="2023-12">2023年12月</option>
                </select>
            
                <input type="submit" value="表示">
            </form>

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
                    print 
                        $_POST["date"] . ": " . $pay_summary['pay_sum'] . " 円" .
                    ;

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
			<input type="button" value="戻る" onClick="location.href="/index.html">
		</div>
	</body>
</html>
