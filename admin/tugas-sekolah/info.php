<?php 
require "../../conn.php";
require "../../boots.php";
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

?>