<?php
	include 'db.php';

	if (isset($_POST["submit"])) {
		$search = mysqli_real_escape_string($conn, $_POST['iskanje']);
		$sql = "SELECT * FROM poslovni_prostori WHERE lokacija LIKE '%$search%'";
		$result = mysqli_query($conn, $sql);
		$queryResult = mysqli_num_rows($result);
		if ($queryResult > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<a href='poslovniProstori.php?title=".$row['lokacija']."&date=".$row['najemnina']."'>";
					echo "<h3>".$row['lokacija']."</h3>";
					echo "<p>".$row['najemnina']."</p>";
					echo "<p>".$row['velikost']."</p>";
					echo "<p>".$row['stanje']."</p>";
				echo "</div></a>";
			}
		} else {
			echo "There are no articles.";
		}
	} else {
		echo "There are no results!";
	}
?>