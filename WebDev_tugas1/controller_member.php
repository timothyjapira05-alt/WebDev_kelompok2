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
    $student->nim = $_POST['inputNIM'];
    $student->gender = $_POST['inputGender'];
    $student->class = $_POST['inputAddress'];
    array_push($_SESSION['liststudent'],$student);
}


function getAllStudent(){
    return  $_SESSION['liststudent'];
}

function deleteMember($studentIndex){
    unset($_SESSION['liststudent'][$studentIndex]);
}

function getStudentWithID($studenID){
    return $_SESSION['liststudent'][$studenID];
}

function updateStudent($studenID){
    $student = $_SESSION['liststudent'][$studenID]; //ambil data dengan index tertentu
    $student->name = $_POST['inputName'];
    $student->nim = $_POST['inputNIM'];
    $student->gender = $_POST['inputGender'];
    $student->class = $_POST['inputAddress'];
}

if (isset($_POST['button_addStudent'])) {
    addStudent();
    header("Location:view_member.php");
}

if (isset($_GET['deleteID'])) {
   deleteMember($_GET['deleteID']);
    header("Location:view_member.php");
}

if (isset($_POST['button_updateStudent'])) {
   updateStudent($_POST['input_id']);
    header("Location:view_member.php");
}



?>