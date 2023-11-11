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

                $trancate_sql = 'TRUNCATE TABLE pay_dest_tran';
                $get_master_sql = 'SELECT * FROM pay_dest_list;';
                $record_id = 1;

                $trancate_result = $db_connect->query($trancate_sql);
                
                if ($tran_result = $db_connect->query($get_master_sql)) {
                    while ($pay_desc_tran = $tran_result->fetch_assoc()){
                        //$insert_sql = "INSERT INTO pay_dest_tran VALUES (" . $pay_desc_tran["pay_dest"] . "," . $_POST["pay_type_$record_id"] . ");";
                        $insert_sql = "INSERT INTO pay_dest_tran VALUES (" . "\"" . $pay_desc_tran["pay_dest"] . "\"" . "," . "\"" . $_POST["pay_type_$record_id"] . "\"" . ");";
                        $insert_result = $db_connect->query($insert_sql);
                        $record_id = $record_id + 1;
                    };
                };
			?>

		<div id="master">
				<table>
					<tr>
						<th>支払先</th>
						<th>費目</th>
					</tr>

					<?php
						$get_tran_sql = 'SELECT * FROM pay_dest_tran;';
						if ($sql_result = $db_connect->query($get_tran_sql)) {
							while ($pay_desc = $sql_result->fetch_assoc()){
								print "<tr>\n";
								print "<td>{$pay_desc['pay_dest']}</td>\n";
								print "<td>{$pay_desc['pay_type']}</td>\n";
								print "</tr>\n\n";
							};
						};
						$db_connect->close();
					?>
				</table>

			<form action="./update_3.php" method="POST">
				<input type="submit" name="commit" value="この内容で更新する">
			</form>

			<br><br>
			<input type="button" value="戻る" onClick="location.href='./update_1.php'">
		</div>
	</body>
</html>
