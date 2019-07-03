<?php

/*
 * fungsi komentar
 * komentar article
 */
function komentar(){
	echo "
	<br/><br/>
	Tulis komentar<br/>
	<form action=\"\" method=\"post\">
	<textarea name=\"comment\"></textarea><br/>
	<input type=\"submit\" name=\"submit\" value=\"Kirim\">
	</form>
	";
}
?>