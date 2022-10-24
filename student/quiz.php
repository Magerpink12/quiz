<?php include("include/header.php") ?>


<?php
extract($_POST);
$alert = "";
if (isset($submit)) {

    if (isset($id2) && !empty($id2)) {

        $quiz = Quiz::find_by_id($id2);
        $quiz->name = $name;
        $quiz->date = $date;
        $quiz->class_id = $class_id;
        if ($quiz->save()) {
            $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Class Successfuly Updated..</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            header("Location: quiz.php");
        }
    } else {

        $quiz = new Quiz;
        $quiz->name = $name;
        $quiz->date = $date;
        $quiz->class_id = $class_id;

        if ($quiz->save()) {
            $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> Class Successfuly Added..</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
}

if (isset($_GET['id'])) {

    $quiz = Quiz::find_by_id($_GET['id']);
    if ($quiz) {
        $id2 = $quiz->id;
        $name2 = $quiz->name;
        $date2 = $quiz->date;
        $class_id2 = $quiz->class_id;
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

                    <li class="nav-item active">
                        <a class="nav-link active text-light" href="quiz.php"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-check2-circle"
                                viewBox="0 0 16 16">
                                <path
                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                <path
                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                            </svg> &nbsp;My Quiz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="report.php"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-bar-chart-steps"
                                viewBox="0 0 16 16">
                                <path
                                    d="M.5 0a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-1 0V.5A.5.5 0 0 1 .5 0zM2 1.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-6a.5.5 0 0 1-.5-.5v-1zm2 4a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-1z" />
                            </svg> &nbsp;My Reports</a>
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
    <div class="row" style=" margin-top: 15px; z-index: 99;">

    </div>
    <div class="col-2">

    </div>
    <div class="col-8">
        <div style="position:relative; margin-top:0px; height: fit-content;" class="bg-light card">
            <div class="card-header">
                <div class="card-title">
                    <h5 class="card-title">My Quiz</h5>
                </div>

            </div>
            <div class="card-body">

                <?php echo $alert; ?>
                <table id="myTable" class="table" style="font-size: 13px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Quiz Name</th>
                            <!-- <th>Class</th> -->
                            <th>Subject</th>
                            <th>date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $quizes = Quiz::find_all();
                        $i = 0;
                        foreach ($quizes as $quiz) :  if ($user->class_id == $quiz->class_id) : $i++; ?>
                        <tr class="table-primary">
                            <td><?php echo $i; ?></td>
                            <td> <?php echo $quiz->name ?></td>
                            <!-- <td> <?php echo Classes::find_by_id($quiz->class_id)->name ?? "<i>Null</i>" ?></td> -->
                            <td> <?php echo Subject::find_by_id($quiz->subject_id)->name ?? "<i>Null</i>" ?></td>
                            <td> <?php echo $quiz->date ?></td>
                            <td> <?php echo $quiz->status == 0 ? "<div class='badge badge-sm bg-danger'>Not done</div>" : "<div class='badge badge-sm bg-success'>done</div>" ?>
                            </td>
                            <td>
                                <?php echo $quiz->status == 0 ? '<a class="btn btn-sm btn-warning" href="quiz/index.php?quiz_id=' . $quiz->id . '">Join Quiz</a>' : '<a class="btn btn-sm btn-secondary">Join Quiz</a>' ?>
                            </td>
                        </tr>
                        <?php endif;
                        endforeach; ?>
                    </tbody>
                </table>

                <div class="card-footer">

                </div>
            </div>
        </div>
        <div class="col-3">

        </div>
    </div>
</div>

</body>
<?php include("include/footer.php") ?>

</html>