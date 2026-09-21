<?php
include("model_member.php");
include("model_classroom.php");

session_start();

//create session liststudent if not exist
if (!isset($_SESSION['liststudent'])) {
    $_SESSION['liststudent'] = array();
}

if (!isset($_SESSION['listpairingclassroom'])) {
    $_SESSION['listpairingclassroom'] = array();
}
function addStudent()
{
    $student = new Student();
    $student->name = $_POST['inputName'];
    $student->phone = $_POST['inputPhone'];
    $student->class = $_POST['inputAddress'];
    array_push($_SESSION['liststudent'],$student);
}

function addPairingClassroom()
{
    $pairing = new Classroom();
    $pairing->student = $_POST['inputName'];
    $pairing->class_number = $_POST['inputAddress'];
    array_push($_SESSION['listpairingclassroom'], $pairing);
}

function getAllStudent(){
    return  $_SESSION['liststudent'];
}

function getAllPairingClassroom(){
    return  $_SESSION['listpairingclassroom'];
    array_push($_SESSION['liststudent'],$student);
}
        


if (isset($_POST['button_addStudent'])) {
    addStudent();
    header("Location:view_member.php");
}

if (isset($_POST['button_pairingClassroom'])) {
    addPairingClassroom();
    header("Location:view_pairingMember.php");
}


?>