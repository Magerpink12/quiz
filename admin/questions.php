<?php include("include/header.php") ?>


<?php
extract($_POST);
$alert = "";
if (isset($submit)) {
    // print_r($_POST);

    if (isset($id2) && !empty($id2)) {

        $answers_json = json_encode($options);

        $question = Question::find_by_id($id2);
        $question->question = $question1;
        $question->options = $answers_json;
        if (!empty($answer)) {
            $question->answer = $options[intval($answer)];
        }
        $question->subject_id = $subject_id;
        if ($question->save()) {
            $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Class Successfuly Updated..</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header("Location: questions.php");
        }
    } else {

        $answers_json = json_encode($options);

        $question = new Question;
        $question->question = $question1;
        $question->options = $answers_json;
        $question->answer = $options[intval($answer)];
        $question->subject_id = $subject_id;

        if ($question->save()) {
            $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Class Successfuly Added..</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
}

if (isset($_GET['id'])) {

    $question = Question::find_by_id($_GET['id']);
    if ($question) {
        $id2 = $question->id;
        $question2 = $question->question;
        $options2 = json_decode($question->options);
        // $correct_answer2 = $question->answer;

        $subject_id2 = $question->subject_id;
    }
}

?>



<div class="header row">

    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">Quiz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="font-size:13px; font-weight: bold; ">
                    <li class="nav-item ">
                        <a class="nav-link  text-light" href="index.php"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-grid-1x2-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm0 9a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-5z" />
                            </svg> &nbsp; Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="class.php"> <svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-people-fill"
                                viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                            </svg> &nbsp; Class</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="students.php"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                            </svg> &nbsp;Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="subject.php"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-card-heading"
                                viewBox="0 0 16 16">
                                <path
                                    d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                                <path
                                    d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z" />
                            </svg> &nbsp;Subjects</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active text-light" href="questions.php"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-question-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                            </svg> &nbsp;Questions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="quiz.php"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-check2-circle"
                                viewBox="0 0 16 16">
                                <path
                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                <path
                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                            </svg> &nbsp;Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="report.php"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps"
                                viewBox="0 0 16 16">
                                <path
                                    d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                            </svg> &nbsp;Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="manage_admins.php"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z" />
                            </svg> &nbsp;Manage Admins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                            </svg> &nbsp;Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill"
                                viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                            </svg> &nbsp;Log Out</a>
                    </li>

                </ul>
                <?php include("include/profile.php") ?>
            </div>
        </div>
    </nav>

</div>
<div class="body row">
    <div class="row" style=" margin-top: 20px; z-index: 99;">
        <form method="POST">
            <div class="row">

                <div class="mb-3 col-4 row">
                    <label for="inputPassword" class="col-sm-3 text-light col-form-label">Subject</label>
                    <div class="col-sm-8">
                        <input type="hidden" name="id2" value="<?php echo isset($id2)  ? $id2 : '' ?>">
                        <select class="form-control form-control-sm mb-2" required type="text" name="subject_id">
                            <option value="">..Choose Subject</option>
                            <?php $subjects = Subject::find_all();
                            foreach ($subjects as $subject) : ?>
                            <option <?php echo isset($subject_id2) && $subject_id2 == $subject->id ? "selected" : "" ?>
                                value="<?php echo $subject->id ?>"><?php echo $subject->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-4 row">
                    <label for="inputPassword" class="col-sm-3 text-light col-form-label">Question</label>
                    <div class="col-sm-8">

                        <textarea required name="question1" class="form-control form-control-sm" rows="2"
                            cols=""><?php echo isset($question2)  ? $question2 : '' ?></textarea>
                    </div>
                </div>

            </div>
            <div class="row">

                <div class="mb-3 col-4 row">
                    <label for="inputPassword" class="col-sm-3 text-light col-form-label">Option A.</label>
                    <div class="col-sm-8">

                        <textarea required name="options[]" class="form-control form-control-sm" rows="1"
                            cols=""><?php echo isset($options2[0])  ? $options2[0] : '' ?></textarea>
                        <input type="radio" required name="answer" value="0">

                    </div>
                </div>
                <div class="mb-3 col-4 row">
                    <label for="inputPassword" class="col-sm-3 text-light col-form-label">Option B.</label>
                    <div class="col-sm-8">

                        <textarea required name="options[]" class="form-control form-control-sm" rows="1"
                            cols=""><?php echo isset($options2[1])  ? $options2[1] : '' ?></textarea>
                        <input type="radio" required name="answer" value="1">

                    </div>
                </div>
                <div class="mb-3 col-3 row">
                    <div class="col-sm-8">

                        <?php echo isset($id2) ? '<a class="btn btn-sm btn-warning mb-2" href="questions.php">Cancel</a>' : "" ?>
                    </div>
                </div>


            </div>
            <div class=" row">

                <div class="mb-3 col-4 row">
                    <label for="inputPassword" class="col-sm-3 text-light col-form-label">Option C.</label>
                    <div class="col-sm-8">

                        <textarea required name="options[]" class="form-control form-control-sm" rows="1"
                            cols=""><?php echo isset($options2[2])  ? $options2[2] : '' ?></textarea>
                        <input type="radio" required name="answer" value="2">
                    </div>
                </div>
                <div class="mb-3 col-4 row">
                    <label for="inputPassword" class="col-sm-3 text-light col-form-label">Option D.</label>
                    <div class="col-sm-8">

                        <textarea required name="options[]" class="form-control form-control-sm" rows="1"
                            cols=""><?php echo isset($options2[3])  ? $options2[3] : '' ?></textarea>
                        <input type="radio" required name="answer" value="3">

                    </div>
                </div>


                <div class="mb-3 col-3 row">
                    <div class="col-sm-8">
                        <input type="submit" name="submit" class="btn btn-sm btn-warning"
                            value="<?php echo isset($id2) ? "Update Question" : "Add Question" ?>" id="inputPassword">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div style="position:relative; margin-top:0px; height: fit-content;" class="bg-light card">
        <div class="card-header">
            <div class="card-title">
                Questions
            </div>
            <!-- <form>
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="password" class="form-control form-control-sm" id="inputPassword">
                            </div>
                            <input type="submit" class="col-sm-1 btn btn-sm btn-warning" value="Add" id="inputPassword">

                        </div>
                    </form> -->
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-8">
                    <?php echo $alert; ?>
                    <table id="myTable" class="table" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Question</th>
                                <th>Options</th>
                                <th>Answer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            $questions = Question::find_all();
                            foreach ($questions as $question) : $i++; ?>
                            <tr class="<?php echo $i % 2 != 0 ? "table-primary" : "" ?>">
                                <td><?php echo $i ?></td>
                                <td><?php echo Subject::find_by_id($question->subject_id)->name ?? "<i>Null</i>"  ?>
                                </td>
                                <td><?php echo $question->question ?></td>
                                <td><?php echo '<ol type="A">  ';
                                        foreach (json_decode($question->options) as $one) {
                                            echo "<li>" . $one . "</li>";
                                        }

                                        echo '</ol>';
                                        ?></td>
                                <td><?php echo $question->answer ?></td>
                                <td><a href="?id=<?php echo $question->id ?>" class="mybtn-success"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                        </svg></a> &nbsp; <a
                                        href="actions/delete_question.php?id=<?php echo $question->id ?>"
                                        class="mybtn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path
                                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                                        </svg></a></td>
                            </tr>
                            <?php endforeach; ?>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>
</div>

</body>
<?php include("include/footer.php") ?>


</html>