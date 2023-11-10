<!DOCTYPE html>
<head>
	<title>retort-pack</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/update_3.css">
	
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
			require './common/connect_to_db.php';
			$menu_sql = "SELECT * FROM beer_menu;";
			$menu_tran_sql = "SELECT * FROM beer_menu_tran;";
			$sql_result = $db_connect->query($menu_sql);
			$tran_sql_result = $db_connect->query($menu_tran_sql);

			for ($index_no=1; $index_no<=7; $index_no++){

				$get_data = $sql_result->fetch_assoc();
				$get_tran_data = $tran_sql_result->fetch_assoc();

				if ("{$get_data['brewery1']}" != "{$get_tran_data['brewery1']}" or
				    "{$get_data['brewery2']}" != "{$get_tran_data['brewery2']}" or
				    "{$get_data['beername1']}" != "{$get_tran_data['beername1']}" or
				    "{$get_data['beername2']}" != "{$get_tran_data['beername2']}" or
				    "{$get_data['locality']}" != "{$get_tran_data['locality']}" or
				    "{$get_data['style1']}" != "{$get_tran_data['style1']}" or
				    "{$get_data['style2']}" != "{$get_tran_data['style2']}" or
				    "{$get_data['abv']}" != "{$get_tran_data['abv']}") {

					$update_sql = "UPDATE beer_menu SET 
							brewery1=\"{$get_tran_data['brewery1']}\",
							brewery2=\"{$get_tran_data['brewery2']}\",
							beername1=\"{$get_tran_data['beername1']}\",
							beername2=\"{$get_tran_data['beername2']}\",
							locality=\"{$get_tran_data['locality']}\",
							style1=\"{$get_tran_data['style1']}\",
							style2=\"{$get_tran_data['style2']}\",
							abv=\"{$get_tran_data['abv']}\"
							WHERE no=\"{$index_no}\"
					";
					$db_connect->query($update_sql);
				};
			};

			$db_connect->close();
		?>

		<div id="master">
			<div id="complete-msg">
				<h4>更新が完了しました。</h4>
				<input type="button" value="ビールメニューへ" onClick="location.href='./menu.php'"><br><br> 
				<input type="button" value="更新画面へ戻る" onClick="location.href='./update_1.php'">
			</div>
		</div>
	</body>
</html>
