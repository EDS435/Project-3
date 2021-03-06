<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
<body>
<nav>
    <ul>
        <li><a href="login.php">Login</a></li>
    </ul>
</nav>
<?php
require('pdo.php');

$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$birthday = filter_input(INPUT_POST, 'birthday');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');


if(strlen($password) < 8) {
    echo 'Password should be at least 8 characters';
}
if (empty($firstName)){
    echo 'First name is empty'; }
echo "<br>";
if (empty($lastName)){
    echo 'Last name is empty'; }
echo "<br>";
if (empty($birthday)){
    echo 'Birthday is empty'; }
echo "<br>";
if (empty($email)){
    echo 'Email is empty'; }
echo "<br>";
if (strpos($email, '@') == false ) {
    echo 'Email must contain an @ character';
    echo "<br>";
}

function create_account($email, $firstName, $lastName, $birthday, $password)
{
    global $db;
    $query = 'INSERT INTO accounts
                    (email, fname, lname, birthday, password)
                  VALUES
                    (:email, :fname, :lname, :birthday, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':fname', $firstName);
    $statement->bindValue(':lname', $lastName);
    $statement->bindValue(':birthday', $birthday);
    $statement->bindValue(':password', $password);

    $statement->execute();
    $statement->closeCursor();

}
?>



<link rel="stylesheet" type="text/css" href="register_display.css">
<h2>Display Registration Inputs</h2>
<div>
    <?php echo "Registration is complete <br>"; ?>
</div>
<div>
    First Name: <?php echo $firstName; ?>
</div>
<div>
    Last Name: <?php echo $lastName; ?>
</div>
<div>
    Birtdhay: <?php echo $birthday; ?>
</div>
<div>
    Email: <?php echo $email; ?>
</div>
<div>
    Password: <?php echo $password; ?>
</div>

<a href="login.html">Go back to login</a>
<br>
<h2>Go To:</h2>
<div type="text-align: center"><a href="create_new_question.php">Question Form</div>
</head>
</body>
</html>
