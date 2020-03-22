<?php
error_reporting(E_ERROR | E_PARSE);
$json = file_get_contents("json/questions.json");
$json_array = json_decode($json, true);
$questions = [];
foreach ($json_array as $key => $questions);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/rating.css">
</head>

<body>
    <div id="body" hidden>
        <div class="container" style="padding: 0rem 2rem;width: 100%;text-align: center;font-size: 1.5rem;background-color: transparent;;color: white;">
            Feedback Form</div>
        <div class="container" style="padding: 2rem;background-color: #e6f1ff;border-radius: 0.75rem;">
            <form method="POST" action="submitted.php">
                <?php
                $i = 1;
                foreach ($questions as $key => $question) {
                    $qId = "q" . $i++;
                ?>
                    <div class="row">
                        <div class="col col-12">
                            <?php echo $question; ?>
                        </div>
                        <div class="col col-12">
                            <div class="star-rating" id="<?php echo $qId; ?>"></div>
                        </div>
                        <div class="col col-12">
                            <textarea name="<?php echo $qId; ?>Text" id="<?php echo $qId; ?>Text" rows="3" cols="50%" placeholder="Write your review here.." hidden></textarea>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div style="width: 100%;text-align: center;margin-top: 2rem;"><input type="submit" value="Submit" class="btnSubmit" name="submitFeedback"></div>
            </form>
        </div>
    </div>
    <div role="status" id="spinner">
        <img src="img/spinner.gif" alt="loading...">
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/rating.js"></script>
</body>

</html>