<?php
require "../db/database.php";
$db = get_db();
// Start Session
session_start();


$song_num = htmlspecialchars($_POST['song_num']);
$orig_artist = htmlspecialchars($_POST['orig_artist']);
$release_date = htmlspecialchars($_POST['release_date']);
echo $song_num;
echo $orig_artist;
echo $release_date;


$sql = 'UPDATE song SET orig_artist=:orig_artist, release_date=:release_date WHERE id=:id';
$stmt = $db->prepare($sql);
$stmt->bindValue(':orig_artist', $orig_artist_title, PDO::PARAM_STR);
$stmt->bindValue(':release_date', $release_date, PDO::PARAM_DATE);
$stmt->bindValue(':id', $song_num, PDO::PARAM_INT);
$stmt->execute();



header("Location: ../index.php");
die();
?>
