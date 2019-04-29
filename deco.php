<?php
SESSION_start();
session_unset ();
session_destroy();
header("location:back.php");

?>