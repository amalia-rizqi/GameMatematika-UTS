<?php
session_start();
require_once "../config.php";

$insert = "
			INSERT INTO users (name, email, score)
			VALUES ('" . $_COOKIE['name'] . "','" . $_COOKIE['email'] . "', '" . $_SESSION['score'] . "')
		";
$update = "
			UPDATE users
			SET name = '{$_COOKIE['name']}',
				email = '{$_COOKIE['email']}',
				score = '{$_SESSION['score']}'
			WHERE email = '{$_COOKIE['email']}';
		";
$conn->query($insert);

if ($conn->error) {
	$conn->query($update);
	echo $conn->error;
}
include "resetgame.php";
	
	//tampilan interface//
	echo "<p>Hello, " . $_COOKIE["name"] . ", Sayang permainan sudah selesai. Semoga kali lain bisa lebih baik.</p>";
	echo "Skor Anda: " . $_SESSION["score"];
	echo "<br>";
?>
	<a href='a/game.php'>[Main Lagi]</a>
	<style type="text/css">
		table,
		tr,
		td,
		th {
			border: 1px solid black;
			padding: 5px;
			}
	</style>
			
	<h2>Leaderboard</h2>
		<table>
			<thead>
				<tr>
					<th scope="col">Rank</th>
					<th scope="col">Nama</th>
					<th scope="col">Email</th>
					<th scope="col">Skor</th>
				</tr>
			</thead>
			<tbody>
<?php
	require_once("../config.php");
	$q = $conn->query("SELECT * FROM users ORDER BY score DESC");
	$no = 0;
	while ($dt = $q->fetch_assoc()) {
	$no++;
	echo "<tr>";
	echo "<th scope='row'>" . $no . "</td>";
	echo "<td>" . $dt["name"] . "</td>";
	echo "<td>" . $dt["email"] . "</td>";
	echo "<td>" . $dt["score"] . "</td>";
	echo "</tr>";
	}
	echo "</table>";
	$conn->close();
?>
			</tbody>
