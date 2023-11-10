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
	$menu_sql -> SQL.
	$sql_result -> exec SQL Result.
	$pay_desc -> Selected menu information.
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
						$get_master_sql = 'SELECT * FROM pay_dest_list;';
						if ($sql_result = $db_connect->query($get_master_sql)) {
							while ($pay_desc = $sql_result->fetch_assoc()){
								print "<tr>\n";
								print "<td>{$pay_desc['pay_dest']}</td>\n";
								print "<td><input type=\"text\" value=\"{$pay_desc['pay_type']}\"><br>\n";
								print "</tr>\n\n";
							};
						};
						$db_connect->close();
					?>
				</table>
				<input type="submit" value="この内容で更新する">
			</form>

			<br><br>
			<input type="button" value="ビールメニューへ" onClick="location.href='./menu.php'">
		</div>
	</body>
</html>
