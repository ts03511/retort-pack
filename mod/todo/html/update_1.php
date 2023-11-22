<!DOCTYPE html>
<head>
	<title>retort-pack</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/update_1.css">
	
</head>

	<body>

		<div id="master">
			<form action="./update_2.php" method="POST">
				<div id="title_area">件名： <input type="text" id="title"></div><br><br>
				<div id="title_area">： 概要<br>
				<textarea name="example" cols="50" rows="100"></textarea>
				<div id="title_area">状態： <input type="text" id="title"></div>
				<div id="title_area">開始日： <input type="text" id="title"></div>
				<div id="title_area">期限日： <input type="text" id="title"></div>
				<input type="submit" value="プレビュー">
			</form>

			<br><br>
			<input type="button" value="戻る" onClick="location.href='./menu.php'">
		</div>
	</body>
</html>
