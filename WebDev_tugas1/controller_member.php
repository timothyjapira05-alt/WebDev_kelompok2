<?php
include("model_member.php");
include("model_classroom.php");

session_start();
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = array();
}
if (!isset($_SESSION['classrooms'])) {
    $_SESSION['classrooms'] = array();
}

function nextStudentId()
{
    return empty($_SESSION['students']) ? 1 : max(array_keys($_SESSION['students'])) + 1;
}

function addStudent()
{
    $student = new Student();
    $student->id = nextStudentId();
    $student->name = isset($_POST['inputName']) ? $_POST['inputName'] : '';
    $student->nim = isset($_POST['inputNIM']) ? $_POST['inputNIM'] : '';
    $student->gender = isset($_POST['inputGender']) ? $_POST['inputGender'] : '';
    $_SESSION['students'][$student->id] = $student;
}

function getAllStudent()
{
    return $_SESSION['students'];
}

function deleteMember($studentId)
{
    unset($_SESSION['students'][$studentId]);
    foreach ($_SESSION['classrooms'] as $classroom) {
        $classroom->studentIds = array_values(array_diff($classroom->studentIds, [$studentId]));
    }
}

function getStudentWithID($studentId)
{
    if (isset($_SESSION['students'][$studentId])) {
        return $_SESSION['students'][$studentId];
    }
    return null;
}

function updateStudent($studentId)
{
    $student = getStudentWithID($studentId);
    if ($student === null) {
        return false;
    }
    $student->name = isset($_POST['inputName']) ? $_POST['inputName'] : '';
    $student->nim = isset($_POST['inputNIM']) ? $_POST['inputNIM'] : '';
    $student->gender = isset($_POST['inputGender']) ? $_POST['inputGender'] : '';
    return true;
}

if (isset($_POST['button_addStudent'])) {
    addStudent();
    header("Location:view_member.php");
    exit;
}

if (isset($_GET['deleteID'])) {
    deleteMember($_GET['deleteID']);
    header("Location:view_member.php");
    exit;
}

if (isset($_POST['button_updateStudent'])) {
    $studentId = isset($_POST['input_id']) ? $_POST['input_id'] : 0;
    updateStudent($studentId);
    header("Location:view_member.php");
    exit;
}
?>