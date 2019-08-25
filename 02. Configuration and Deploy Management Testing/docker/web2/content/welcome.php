<h2>Hello <?php echo $_SESSION['username']; ?></h2>
<?php
if($_SESSION['username'] != "admin")
{
  echo "<h3>Login as 'admin' user to access privileged pages</h3>";
}
?>
