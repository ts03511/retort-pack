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
	$menu_info -> Selected menu information.
-->

	<body>
			<?php
				require './common/connect_to_db.php';
			?>

		<div id="master">
			<form action="./update_2.php" method="POST">
				<table>
					<tr>
						<th>NO</th>
						<th>BREWERY</th>
						<th>BEERNAME</th>
						<th>Locality</th>
						<th>Style</th>
						<th>ABV</th>
					</tr>

					<?php
						$menu_sql = 'SELECT * FROM beer_menu;';
						if ($sql_result = $db_connect->query($menu_sql)) {
							while ($menu_info = $sql_result->fetch_assoc()){
								print "<tr>\n";
								print "<td>{$menu_info['no']}</td>\n";
								print "<td><input type=\"text\" name=\"no{$menu_info['no']}_brewery1\" value=\"{$menu_info['brewery1']}\" class=\"fValue\"><br>\n";
								print "<input type=\"text\" name=\"no{$menu_info['no']}_brewery2\" value=\"{$menu_info['brewery2']}\" class=\"fValue\"></td>\n";
								print "<td><input type=\"text\" name=\"no{$menu_info['no']}_beername1\" value=\"{$menu_info['beername1']}\" class=\"fValue\"><br>\n";
								print "<input type=\"text\" name=\"no{$menu_info['no']}_beername2\" value=\"{$menu_info['beername2']}\" class=\"fValue\"></td>\n";
								print "<td><input type=\"text\" name=\"no{$menu_info['no']}_locality\" value=\"{$menu_info['locality']}\" class=\"fValue\"></td>\n";
								print "<td><input type=\"text\" name=\"no{$menu_info['no']}_style1\" value=\"{$menu_info['style1']}\" class=\"fValue\"><br>\n";
								print "<input type=\"text\" name=\"no{$menu_info['no']}_style2\" value=\"{$menu_info['style2']}\" class=\"fValue\"></td>\n";
								print "<td><input type=\"text\" name=\"no{$menu_info['no']}_abv\" value=\"{$menu_info['abv']}\" class=\"fValue\"></td>\n";
								print "</tr>\n\n";
							};
						};
						$sql_result->close();
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
