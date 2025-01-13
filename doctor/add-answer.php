<?php
include_once 'inc/functions.php';


if(isset($_POST['btn'])){

    $answer_text = $_POST['answer_txt'];
    $question_id = $_GET['id'];
    $uid = 1;

    add_answer($answer_text,$question_id,$uid);
    header('location:index.php?ok');

}



?>
<div class="card mb-3">
    <div class="card-header">
        افزودن پاسخ جدید
    </div>
    <div class="card-body">
        <!-- form area -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">

                    <div class="form-group">
                        <textarea name="answer_txt" cols="30" rows="10" class="form-control"
                                  placeholder="پاسخ به سوال"></textarea>
                        <br>
                        <input type="submit" name="btn" class="btn btn-primary btn-lg" value="افزودن">

                    </div>

                </div>

            </div>
        </form>


    </div>
</div>