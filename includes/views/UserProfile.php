<h1><?php echo $_GET['username'] ?>'s Profile Page!</h1>
<?php
echo "<pre>";
UserProfile::getUserDetails($_GET['username']);
?>
