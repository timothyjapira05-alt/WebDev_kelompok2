<?php
include("model_classroom.php");
include("model_member.php");

session_start();
if (!isset($_SESSION['classrooms'])) {
    $_SESSION['classrooms'] = array();
}
if (!isset($_SESSION['students'])) {
    $_SESSION['students'] = array();
}

function nextClassroomId()
{
    if (empty($_SESSION['classrooms'])) {
        return 1;
    }
    return max(array_keys($_SESSION['classrooms'])) + 1;
}

function addClassroom()
{
    $classroom = new Classroom();
    $classroom->id = nextClassroomId();
    if (isset($_POST['inputClassName'])) {
        $classroom->className = $_POST['inputClassName'];
    } else {
        $classroom->className = '';
    }
    if (isset($_POST['inputTeacher'])) {
        $classroom->teacher = $_POST['inputTeacher'];
    } else {
        $classroom->teacher = '';
    }
    $_SESSION['classrooms'][$classroom->id] = $classroom;
}

function updateClassroom($classroomID){
    if (!isset($_SESSION['classrooms'][$classroomID])) {
        return;
    }
    $classroom = $_SESSION['classrooms'][$classroomID];
    if (isset($_POST['inputClassName'])) {
        $classroom->className = $_POST['inputClassName'];
    } else {
        $classroom->className = '';
    }
    if (isset($_POST['inputTeacher'])) {
        $classroom->teacher = $_POST['inputTeacher'];
    } else {
        $classroom->teacher = '';
    }
}

function deleteClassroom($classroomIndex){
    unset($_SESSION['classrooms'][$classroomIndex]);
}

function getAllClassroom(){
    return $_SESSION['classrooms'];
}

function getClassroomWithID($classroomID){
    if (isset($_SESSION['classrooms'][$classroomID])) {
        return $_SESSION['classrooms'][$classroomID];
    }
    return null;
}

function getAllStudent()
{
    return $_SESSION['students'];
}

function getStudentWithID($studentId)
{
    if (isset($_SESSION['students'][$studentId])) {
        return $_SESSION['students'][$studentId];
    }
    return null;
}

function assignStudentToClassroom($studentId, $classroomId)
{
    if (!isset($_SESSION['students'][$studentId], $_SESSION['classrooms'][$classroomId])) {
        return;
    }
    foreach ($_SESSION['classrooms'] as $classroom) {
        $classroom->studentIds = array_values(array_diff($classroom->studentIds, [$studentId]));
    }
    $_SESSION['classrooms'][$classroomId]->studentIds[] = $studentId;
}

function deletePair($studentId, $classroomId)
{
    if (!isset($_SESSION['classrooms'][$classroomId])) {
        return;
    }
    $_SESSION['classrooms'][$classroomId]->studentIds = array_values(
        array_diff($_SESSION['classrooms'][$classroomId]->studentIds, [$studentId])
    );
}

if (isset($_POST['button_addClassroom'])) {
    addClassroom();
    header("Location:view_classroom.php");
    exit;
}

if (isset($_POST['button_updateClassroom'])) {
   updateClassroom($_POST['input_id']);
    header("Location:view_classroom.php");
    exit;
}

if (isset($_GET['deleteID'])) {
   deleteClassroom($_GET['deleteID']);
    header("Location:view_classroom.php");
    exit;
}

if (isset($_GET['deleteStudentID']) && isset($_GET['deleteClassroomID'])) {
    deletePair($_GET['deleteStudentID'], $_GET['deleteClassroomID']);
    header("Location:view_member_classroom.php");
    exit;
}

if (isset($_POST['button_submitPair'])) {
    $studentId = isset($_POST['student_id']) ? $_POST['student_id'] : 0;
    $classroomId = isset($_POST['classroom_id']) ? $_POST['classroom_id'] : 0;
    assignStudentToClassroom($studentId, $classroomId);
    header("Location:view_member_classroom.php");
    exit;
}
?>