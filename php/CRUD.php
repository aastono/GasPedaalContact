<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/15/2016
 * Time: 5:56 PM
 */

$query = $conn->query("SELECT * FROM users WHERE userID=" . $_SESSION['userSession']);
$userRow = $query->fetch_array();


if (isset($_POST['save'])) {

    $name = $conn->real_escape_string($_POST['phoneName']);
    $number = $conn->real_escape_string($_POST['phoneNumber']);
    $time = $conn->real_escape_string($_POST['timeOfCall']);
    $notes = $conn->real_escape_string($_POST['notes']);


    $SQL = $conn->prepare("INSERT INTO contacts (phoneName,phoneNumber,timeOfCall,notes,userID) VALUES(?,?,?,?,?)");
    $SQL->bind_param("ssssi", $name, $number, $time, $notes, $_SESSION['userSession']);
    $SQL->execute();

    if (!$SQL) {
        echo $conn->error;
    }

    $SQL->close();
}

if (isset($_GET['del'])) {
    $SQL = $conn->prepare("DELETE FROM contacts WHERE id=" . $_GET['del']);
    $SQL->bind_param("i", $_GET['del']);
    $SQL->execute();
    header("Location: home.php");
    $SQL->close();

}

if (isset($_GET['edit'])) {
    $SQL = $conn->query("SELECT * FROM contacts WHERE id=" . $_GET['edit']);
    $getROW = $SQL->fetch_array();
    $SQL->close();

}

if (isset($_POST['update'])) {
    $SQL = $conn->prepare("UPDATE contacts SET phoneName=?, phoneNumber=?, timeOfCall=?, notes=? WHERE id=?");
    $SQL->bind_param("ssssi", $_POST['phoneName'], $_POST['phoneNumber'], $_POST['timeOfCall'], $_POST['notes'], $_GET['edit']);
    $SQL->execute();
    header("Location: home.php");
    $SQL->close();

}


?>