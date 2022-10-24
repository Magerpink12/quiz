<?php include("../../admin/include/configuration/init.php");
if (isset($_SESSION['student_id'])) {
    $user = Student::find_by_id($_SESSION['student_id']);
    // print_r($_SESSION);
    if ($user) {
    } else {
        header("Location: ../");
    }
} else {
    header("Location: ../");
}

if (isset($_GET['quiz_id'])) {
    $quiz = Quiz::find_by_id($_GET['quiz_id']);
    // print_r($_GET);
    if ($quiz) {
    } else {
        header("Location: ../");
    }
} else {
    header("Location: ../");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
    <!-- FontAweome CDN Link for Icons-->
    <link href="../../admin/dist/bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="../../admin/dist/style.css" rel="stylesheet">
    <script src="../../admin/dist/datatable/jQuery-3.6.0/jquery-3.6.0.js">
    </script>

</head>

<body>

    <div class="row p-5">
        <center>
            <h3> <strong><?php echo $quiz->name ?> Quiz</strong></h3>
        </center>
    </div>
    <!-- start Quiz button -->
    <div class="start_btn"><button>Start Quiz</button></div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Some Rules of this Quiz</span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
            <div class="info">2. Once you select your answer, it can't be undone.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the Quiz while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
        </div>
        <div class="buttons">
            <button class="quit">Exit Quiz</button>
            <button class="restart">Continue</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title"><?php echo Subject::find_by_id($quiz->subject_id)->name ?> Questions</div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">15</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Next Que</button>
        </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">You've completed the Quiz!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>

        <input id="score" type="number" name="score" value="">
        <div class="buttons">
            <button class="restart">Replay Quiz</button>
            <button class="quit">Quit Quiz</button>
        </div>

    </div>

    <script>
    var user_id = <?php echo $user->id ?>;
    var quiz_id = <?php echo $quiz->id ?>;

    let questions = [

        <?php
            $i = 0;
            $questions = Question::find_all();
            foreach ($questions as $question) : if ($question->subject_id == $quiz->subject_id) : $i++;
            ?> {
            numb: <?php echo $i ?>,
            question: "<?php echo $question->question ?>",
            answer: "<?php echo $question->answer ?>",
            <?php $options = json_decode($question->options); ?>
            options: [
                <?php foreach ($options as $option) : ?> "<?php echo $option ?>",
                <?php endforeach ?>
            ]
        },
        <?php endif;
            endforeach ?>
    ]
    </script>



    <!-- Inside this JavaScript file I've inserted Questions and Options only 
    -->
    <!-- <script src="js/questions.js"></script> -->

    <!-- Inside this JavaScript file I've coded all Quiz Codes -->
    <script src="js/script.js">
    </script>

</body>

</html>