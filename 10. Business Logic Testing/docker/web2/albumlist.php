<?php
    include_once('connectdb.php');
    session_start();
    if( !isset($_SESSION["user"]) ){
        header("location:index.php");
        exit;
    }
	$user = json_decode($_SESSION["user"]);

	$query = "select id,album_name from album_catalog";
	$result = mysqli_query($conn, $query);

?>
<?php include "header.php"; ?>
<br>
<table class="table">
	<thead>
		<tr>
			<th scope="col">UID</th>
			<th scope="col">Album Name</th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>

<?php
	while ($row=mysqli_fetch_assoc($result))
	{
		echo "<tr>";
		echo "<td>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
		echo "<td>" . htmlspecialchars($row['album_name'], ENT_QUOTES, 'UTF-8') . "</td>";
		echo "<td><a href=albumdetail.php?id=" . $row['id'] . ">status
</a></td>";
		echo "</tr>";
	}
?>
	<tbody>
</table>
<?php include "footer.php"; ?>
