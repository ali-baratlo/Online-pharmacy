<?php
include_once '../connectDB/config.php';

function doctor_login($username, $password)
{
    $a = 'doctor';
    $b = '123456';
    if ($username == $a && $password == $b) {
        $_SESSION['doctor'] = $a;
        return true;
    } else {
        return false;
    }
}

function add_question($question,$user_id)
{
    global $connection;
    $sql = "insert into questions (question_text,user_id) values ('$question','$user_id')";
    mysqli_query($connection, $sql);
}

function get_user_questions($user_id)
{
    global $connection;

    $sql = "SELECT * FROM questions";

    if (!empty($user_id)) {
        $sql .= " WHERE user_id = '$user_id'";
    }

    $result = mysqli_query($connection, $sql);

    $questions = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row;
    }

    return $questions;
}


function get_answers_for_question($question_id)
{
    global $connection;

    $sql = "SELECT answer_text FROM answer WHERE question_id = '$question_id'";
    $result = mysqli_query($connection, $sql);

    $answers = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $answers[] = $row['answer_text'];
    }

    return $answers;
}

function add_answer($answer_text,$question_id,$uid)
{
    global $connection;
    $sql = "insert into answer (answer_text,user_id, question_id) values ('$answer_text','$uid','$question_id')";
    mysqli_query($connection, $sql);
}