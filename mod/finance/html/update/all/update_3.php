<!DOCTYPE html>
<head>
	<title>retort-pack</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../../css/update_3.css">
	
</head>

<!-- List of valiables.
	$menu_sql -> For Get Data SQL.
	$menu_tran_sql -> For Get Data SQL.
	$update_sql -> For Update Data SQL.
	$sql_result -> $menu_sql Result.
	$tran_sql_result -> $menu_tran_sql Result.
	$index_no -> Database index No.
	$get_data -> Get data from $sql_result.
	$get_tran_data -> Get data from $tran_sql_result.
-->

	<body>
		<?php
			require './../../common/connect_to_db.php';
			$drop_sql = "DROP TABLE pay_dest_list;";
			$refresh_sql = "CREATE TABLE pay_dest_list AS SELECT * FROM pay_dest_tran;";
			$db_connect->query($drop_sql);
			$db_connect->query($refresh_sql);
			$db_connect->close();
		?>

		<div id="master">
			<div id="complete-msg">
				<h4>更新が完了しました。</h4>
				<input type="button" value="トップへ戻る" onClick="location.href='/'">
			</div>
		</div>
	</body>
</html>
