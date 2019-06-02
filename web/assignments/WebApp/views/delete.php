<?php
require "../db/database.php";
$db = get_db();
// Start Session
session_start();

//Get ID from URL
$id = filter_var($_GET['id']);

$stmt = $db->prepare('DELETE FROM songsuggest WHERE id = ' . $id);
$stmt->execute();

header("Location: suggestSong.php");
?>
