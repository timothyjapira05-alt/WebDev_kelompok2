<?php
include("model_member.php");

session_start();

//create session liststudent if not exist
if (!isset($_SESSION['liststudent'])) {
    $_SESSION['liststudent'] = array();
}
function addStudent()
{
    $student = new Student();
    $student->name = $_POST['inputName'];
    $student->phone = $_POST['inputPhone'];
    $student->class = $_POST['inputAddress'];
    array_push($_SESSION['liststudent'],$student);
}


function getAllStudent(){
    return  $_SESSION['liststudent'];
}


if (isset($_POST['button_addStudent'])) {
    addStudent();
    header("Location:view_member.php");
}
?>