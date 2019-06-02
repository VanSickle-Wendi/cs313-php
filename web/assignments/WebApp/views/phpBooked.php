<?php
require "../db/database.php";
$db = get_db();
// Start Session
session_start();

$date = htmlspecialchars($_POST['date']);
$time = htmlspecialchars($_POST['time']);
$venue = htmlspecialchars($_POST['venue']);

$stmt = $db->prepare('INSERT INTO performances(date, time) VALUES(:date, :time);');
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':time', $time, PDO::PARAM_STR);
$stmt->execute();

header("Location: book.php");
?>

