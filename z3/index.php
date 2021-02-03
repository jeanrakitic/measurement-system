
<?php
	$time = date('H:i:s', time());
	$user  = $_POST['user'];
	$post  = $_POST['post'];
	if (IsSet($_POST['post'])) {
		$text = '<table  border=”1” width="90%">
		<tr><td>' . $post . '</td><td width="80">' . $user . '</td><td width="60" bgcolor="yellow">'. $time.'</td></tr></table><br>';
		$file = fopen ("conversation.txt", "a+");
		fwrite ($file, $text);
	} 
?>

<form method="POST">
<br>
Nick:<input type="text" name="user" maxlength="10" size="10"><br>
Post:<input type="text" name="post" maxlength="90" size="90"><br>
<input type="submit" value="Send"/>
</form>

Posts:
<br>
<? include ("conversation.txt");?>
<br>
