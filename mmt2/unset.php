<?php
include_once("includes/db.php");
session_start();

unset($_SESSION["user_id"]);

header("Location: index.php");
exit();

?>