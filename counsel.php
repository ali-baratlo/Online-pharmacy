<?php
include_once 'inc/functions.php';
if (!isset($_SESSION['username'])) {
    header('location:login.php?restrict');
    exit();
}
$user_id = $_SESSION['user_id'];
$user_questions = get_user_questions($user_id);

if (isset($_POST['btn'])) {
    $question = $_POST['question'];
    $user_id = $_SESSION['user_id'];
    add_question($question, $user_id);
    header('location:counsel.php?ok');
    exit();
}
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>پرسش و پاسخ</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-rtl.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">
    </head>
    <body>
    <?php include('header.php'); ?>
    <div class="container mt-4">
        <div class="row">
            <?php include ('menu.php'); ?>
            <div class="col-lg-9">
                <div class="panel">
                    <div class="panel-heading bg-info text-white">پرسش خود را مطرح کنید</div>
                        <form action="" method="post" class="px-3 pt-2">
                            <div class="form-group">
                            <textarea id="question" class="form-control" name="question" rows="4" cols="50" required oninvalid="this.setCustomValidity('لطفا سوال خود را مطرح نمایید')"></textarea>
                            </div>
                            <button name="btn" class="btn btn-success mb-2" type="submit">ارسال سوال</button>
                        </form>
                </div>


                <div class="card card-outline-secondary my-4">
                    <div class="card-header">پرسش و پاسخ</div>
                        <div class="card-body">
                            <?php foreach ($user_questions as $user_question) {  ?>
                                <div>
                                    <strong>سوال: <?php echo $user_question['question_text']; ?></strong>
                                </div>
                                <?php
                                $answers = get_answers_for_question($user_question['id']);
                                if (empty($answers)) {
                                    echo '<div><p>پاسخی دریافت نشده</p></div>';
                                } else {
                                    foreach ($answers as $answer) {
                                        ?>
                                        <div>
                                            <p>پاسخ: <?php echo $answer; ?></p>
                                        </div>
                                        <?php
                                    }
                                }
                            }?>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <?php include ('footer.php'); ?>


