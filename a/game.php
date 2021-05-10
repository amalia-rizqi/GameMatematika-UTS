<?php
session_start();

function randomize()
{
	$angka1 = rand(1, 20);
	$angka2 = rand(1, 20);
	$kunci = $angka1 + $angka2;
	$_SESSION["angka1"] = $angka1;
	$_SESSION["angka2"] = $angka2;
	$_SESSION["kunci"] = $kunci;
}

if (!isset($_SESSION["lives"])) {
	include("resetgame.php");
	header("Location: game.php");
}

if ($_SESSION["lives"] <= 0) {
	header("Location: leaderboard.php");
}

if (!isset($_SESSION['kunci'])) {
	$_SESSION['msg'] = "tetap semangat ya... you can do the best!!";
	randomize();
	header("Location: game.php");
}

if (isset($_POST['jawab'])) {
	if ($_POST['answer'] == $_SESSION['kunci']) {
		randomize();
		$_SESSION["score"] = $_SESSION["score"] + 10;
		$_SESSION['msg'] = "Selamat jawaban Anda benar...";
		header("Location: game.php");
	} else {
		$_SESSION["score"] = $_SESSION["score"] - 2;
		$_SESSION["lives"] = $_SESSION["lives"] - 1;
		$_SESSION['msg'] = "sayang jawaban Anda salah... tetap semangat ya !!!";
		header("Location: game.php");
	}
}

	echo "Hallo " . $_COOKIE['name'] . ", " . $_SESSION['msg'];
	echo "<br>";
	echo "Lives: " . $_SESSION['lives'] . " | Score: " . $_SESSION['score'];
	echo "<br>";
	echo "Berapakah " . $_SESSION["angka1"] . " + " . $_SESSION["angka2"];
	echo "<br>";
	?>
	
	<form action="game.php" method="POST">
		<input type="number" name="answer">
		<input type="submit" name="jawab" value="Submit">
	</form>
