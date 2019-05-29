<?php
$book = htmlspecialchars($_POST['book']);
$chapter = htmlspecialchars($_POST['chapter']);
$verse = htmlspecialchars($_POST['verse']);
$content = htmlspecialchars($_POST['content']);
$topic = htmlspecialchars($_POST['topic']);


echo "$book\n";
echo "$chapter\n";
echo "$verse\n";
echo "$content";
echo "$major";