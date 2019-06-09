<?php
require "../db/database.php";
$db = get_db();
// Start Session
session_start();

$song_title = htmlspecialchars($_POST['song_title']);
$artist = htmlspecialchars($_POST['artist']);

$stmt = $db->prepare('INSERT INTO songsuggest(song_title, artist) VALUES(:song_title, :artist);');
$stmt->bindValue(':song_title', $song_title, PDO::PARAM_STR);
$stmt->bindValue(':artist', $artist, PDO::PARAM_STR);
$stmt->execute();

header("Location: suggestSong.php");
die();
?>

<?php

$song_num = htmlspecialchars($_POST['song_num']);
$orig_artist = htmlspecialchars($_POST['orig_artist']);
$release_date = htmlspecialchars($_POST['release_date']);

$stmt = $db->prepare('UPDATE song SET orig_artist=:orig_artist, release_date=:release_date WHERE id=:id);');
$stmt->bindValue(':id', $song_num, PDO::PARAM_INT);
$stmt->bindValue(':orig_artist', $orig_artist_title, PDO::PARAM_STR);
$stmt->bindValue(':release_date', $release_date, PDO::PARAM_STR);
$stmt->execute();

header("Location: ../index.php");
die();
?>