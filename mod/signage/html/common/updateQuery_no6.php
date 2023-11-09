<?php
/*
Get Post Data [X=1 to 7]
	$noX_brewery1
	$noX_brewery2
	$noX_beername1
	$noX_beername2
	$noX_locality 
	$noX_style1
	$noX_style2
	$noX_abv
*/
	$update_sql = "UPDATE beer_menu_tran SET 
		brewery1=\"{$_POST['no6_brewery1']}\",
		brewery2=\"{$_POST['no6_brewery2']}\",
		beername1=\"{$_POST['no6_beername1']}\",
		beername2=\"{$_POST['no6_beername2']}\",
		locality=\"{$_POST['no6_locality']}\",
		style1=\"{$_POST['no6_style1']}\",
		style2=\"{$_POST['no6_style2']}\",
		abv=\"{$_POST['no6_abv']}\"
		WHERE no=\"6\"
	";
?>
