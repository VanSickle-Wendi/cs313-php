<?php
require "../db/database.php";
$db = get_db();
//include('database.php');

$song_title = htmlspecialchars($_POST['song_title']);
$artist = htmlspecialchars($_POST['artist']);

$stmt = $db->prepare('INSERT INTO songsuggest(song_title, artist) VALUES(:song_title, :artist);');
$stmt->bindValue(':song_title', $song_title, PDO::PARAM_STR);
$stmt->bindValue(':artist', $artist, PDO::PARAM_STR);
$stmt->execute();

header("Location: suggestSong.php");
?>

