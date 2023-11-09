<?php
	if ($sql_result = $db_connect->query($history_sql)) {
		while ($history = $sql_result->fetch_assoc()){
			if ($history['type']) {
				print "<tr>\n";
				    print "<td><span class=\"cId\">{$menu_info['id']}</span></td>\n";
				    print "<td><span class=\"cDate\">{$menu_info['registered_date']}</span><br>\n";
				    print "<td><span class=\"cType\">{$menu_info['type']}</span></span><br>\n";
				    print "<td><span class=\"cValue\">{$menu_info['value']}</span></span></td>\n";
				print "</tr>\n\n";
			};
		};
	};
?>
