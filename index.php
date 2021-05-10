<?php
require_once('create.php');
if (isset($_POST['submit'])) {
	setcookie("name", $_POST['name'], time() + 60 * 60 * 24 * 30, "/");
	setcookie("email", $_POST['email'], time() + 60 * 60 * 24 * 30, "/");
	header("Location:index.php");
}
?>


<?php
if (isset($_COOKIE['name'])) {
	echo "<p>Halo " . $_COOKIE["name"] . ", selamat datang kembali di permainan ini !!</p>
			<a href='a/game.php'>[Start Game]</a>
			<form method='POST' action='reset.php'>
				<input type='submit' name='reset' value='Bukan Anda? (klik di sini)'>
			</form>";
} else {
?>
<html>
<head>
<title>Game Penjumlahan</title>
</head>
</html>
<body>
	<br>
	<p>Halo, Selamat datang di permainan matematika</p><br>
	<form method="POST" action="index.php">
	<table width="25%" border="0">
	<tr>
	<td>Masukkan Nama : </td>
	<td><input type="text" name="name" placeholder="Nama"></td>
	</tr>
	<tr>
	<td>Masukkan Email</td>
	<td><input type="email" name="email" placeholder="Email"></td>
	</tr>
	<td></td>
	<td><input type="submit" name="submit" value="Submit"></td>
	</tr>
	</table>
	</form>
</body>
<?php } ?>