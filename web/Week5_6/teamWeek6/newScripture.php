<?php

require 'dbConnect.php';
$db = get_db();
?>

<?php

$add_book = htmlspecialchars($_POST['add_book']);
$add_chapter = htmlspecialchars($_POST['add_chapter']);
$add_verse = htmlspecialchars($_POST['add_verse']);
$add_content = htmlspecialchars($_POST['add_content']);
$topics = $_POST['topics'];

$newTopic = htmlspecialchars($_POST['newTopic']);
$newTopic_text = htmlspecialchars($_POST['newTopic_text']);

$stmt = $db->prepare('INSERT INTO scriptures(book, chapter, verse, content) VALUES(:add_book, :add_chapter, :add_verse, :add_content);');
$stmt->bindValue(':add_book', $add_book, PDO::PARAM_STR);
$stmt->bindValue(':add_chapter', $add_chapter, PDO::PARAM_INT);
$stmt->bindValue(':add_verse', $add_verse, PDO::PARAM_INT);
$stmt->bindValue(':add_content', $add_content, PDO::PARAM_STR);
$stmt->execute();
$scripture_id = $db->lastInsertId();
foreach ($topics as $t) {

    $stmt = $db->prepare('INSERT INTO scriptures_topic(scriptures_id, topic_id) VALUES(:scriptures_id, :topic_id);');
    $stmt->bindValue(':scriptures_id', $scripture_id, PDO::PARAM_INT);
    $stmt->bindValue(':topic_id', $t, PDO::PARAM_INT);
    $stmt->execute();
}

if ($newTopic == "true") {
    $stmt = $db->prepare('INSERT INTO topic(name) VALUES(:name)');
    $stmt->bindValue(':name', $newTopic_text, PDO::PARAM_STR);
    $stmt->execute();
    $topic_id = $db->lastInsertId();

    $stmt = $db->prepare('INSERT INTO scriptures_topic(scriptures_id, topic_id) VALUES(:scriptures_id, :topic_id)');
    $stmt->bindValue(':scriptures_id', $scripture_id, PDO::PARAM_INT);
    $stmt->bindValue(':topic_id', $topic_id, PDO::PARAM_INT);
    $stmt->execute();
}

header("Location: add.php");
?>


