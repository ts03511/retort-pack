<!DOCTYPE html>
<head>
	<title>retort-pack</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/update_1.css">
	
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
			<form action="./update_2.php" method="POST">
				<table>
					<tr>
						<th>支払先</th>
						<th>費目</th>
					</tr>

					<?php
						$get_master_sql = 'SELECT * FRO< pay_dest_list'
                            /*
                            'SELECT 
                                pay_dest_list.pay_dest,
                                pay_dest_tran.pay_type
                             FROM 
                                pay_dest_list
                             LEFT OUTER JOIN 
                                pay_dest_tran
                             ON
	                            pay_dest_list.pay_dest = pay_dest_tran.pay_dest
                             ORDER BY
	                            pay_dest asc
                            '
                            */
                        ;

                        $record_id = 1;
						if ($sql_result = $db_connect->query($get_master_sql)) {
							while ($pay_desc = $sql_result->fetch_assoc()){
								print "<tr>\n";
								print "<td>{$pay_desc['pay_dest']}</td>\n";
								print "<td><input type=\"text\" name=\"pay_type_{$record_id}\" value=\"{$pay_desc['pay_type']}\"></td>\n";
								print "</tr>\n\n";
                                $record_id = $record_id + 1;
							};
						};
						$db_connect->close();
					?>
				</table>
				<input type="submit" value="プレビュー">
			</form>

			<br><br>
			<input type="button" value="戻る" onClick="location.href='/">
		</div>
	</body>
</html>
