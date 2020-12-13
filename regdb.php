<?php
require('pdo.php');

$fName = filter_input(INPUT_POST, 'fName');
$lName = filter_input(INPUT_POST, 'lName');
$Bday = filter_input(INPUT_POST, 'Bday');
$Email = filter_input(INPUT_POST, 'Email');
$Pword = filter_input(INPUT_POST, 'Pword');

function create_account($Email, $fName, $lName, $Bday, $Pword)
{
    global $db;
    $query = 'INSERT INTO accounts
                    (email, fname, lname, birthday, password)
                  VALUES
                    (:Email, :firstname, :lastname, :Bday, :Pword)';
    $statement = $db->prepare($query);
    $statement->bindValue(':Email', $Email);
    $statement->bindValue(':firstname', $fName);
    $statement->bindValue(':lastname', $lName);
    $statement->bindValue(':Bday', $Bday);
    $statement->bindValue(':Pword', $Pword);

    $statement->execute();
    $statement->closeCursor();

}

if(strlen($Pword) < 8) {
    echo 'Your password is too short. Your password needs to be longer than 8 characters ';
}
if (empty($fName)){
    echo 'You did not input your first name'; }
echo "<br>";
if (empty($lName)){
    echo 'You did not input your last name'; }
echo "<br>";
if (empty($Bday)){
    echo 'You have not input your birthday'; }
echo "<br>";
if (empty($Email)){
    echo 'Email is empty'; }
echo "<br>";
if (strpos($Email, '@') == false ) {
    echo 'Email must contain an @ character';
    echo "<br>";
}
include('log.php');

?>