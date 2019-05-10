<?php
include_once './_data.php';

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$majorAbbr = filter_input(INPUT_POST, 'major', FILTER_SANITIZE_STRING);
$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
//Using the Ternary Operator. The basic syntax is: (condition) ? 'true' : 'false':
//If the condition is true, the first value - after the question mark - is returned.
//If the condition is false, the second value - after the colon  - is returned.
//https://www.larryullman.com/2008/10/29/using-the-ternary-operator-in-php/
//The following statement could have been written in an if else statement.
$visitedValues = !empty($_POST['visited']) ? $_POST['visited'] : [];

$major = !empty($majors[$majorAbbr]) ? $majors[$majorAbbr] : '';

$cleanedValues = [];

foreach ($visitedValues as $item) {
    $abbr = htmlspecialchars($item);
    if (!empty($continents[$abbr])) {
        $cleanedValues[] = $continents[$abbr]; 
    }
}
if (empty($cleanedValues)) {
    $cleanedValues[] = "No continents have been visited";
}
?>
<html>
    <body>
        <div>
            Name: <?= $name; ?>
        </div>
        <div>
            Email: <a href="mailto:<?= $email; ?>"><?= $email; ?></a>
        </div>
        <div>
            Major: <?= $major; ?>
        </div>
        <div>
            Comments: <?= $comments; ?>
        </div>
        <div>
        Visited Continent: 
            <ul>
                <?php foreach ($cleanedValues as $value) : ?>
                    <li><?= $value; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </body>
</html>



