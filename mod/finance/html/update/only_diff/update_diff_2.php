<!DOCTYPE html>
<head>
	<title>retort-pack</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="./../../../css/base.css">
	
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


		<div id="master">
				<table>
					<tr>
						<th>支払先</th>
						<th>費目</th>
					</tr>

					<?php
				        require './../common/connect_to_db.php';
                        for ($record_id=1; $record_id<=3; $record_id++) {
                            print "<tr>\n";
                            print "<td>" . $_POST["pay_dest_$record_id"] . "</td>\n";
                            print "<td>" . $_POST["pay_type_$record_id"] . "</td>\n";
                            print "</tr>\n\n";
						};
						$db_connect->close();
					?>
				</table>

			<form action="./update_diff_3.php" method="POST">
				<input type="submit" name="commit" value="この内容で更新する">
			</form>

			<br><br>
			<input type="button" value="戻る" onClick="location.href='./update_all_1.php'">
		</div>
	</body>
</html>
