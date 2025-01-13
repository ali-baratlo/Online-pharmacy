<?php

include_once 'connectDB/config.php';

function user_login($data)
{
    global $connection;

    $sql = "SELECT * FROM users WHERE username='$data[username]'";
    $row = mysqli_query($connection, $sql);
    $res = mysqli_fetch_assoc($row);

    if ($res['password'] == $data['password']) {
        $_SESSION['username'] = $res['username'];
        $_SESSION['user_id'] = $res['id'];
       return true;
    } else {
       return false;
    }
}

function user_register($data)
{
    global $connection;
    $sql = "insert into users (name,username,password) values ('$data[name]','$data[username]','$data[password]')";
    mysqli_query($connection, $sql);
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
    $result = mysqli_query($connection , $sql);
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