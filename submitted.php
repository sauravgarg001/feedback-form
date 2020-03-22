<?php
error_reporting(E_ERROR | E_PARSE);

$json = file_get_contents("json/questions.json");
$json_array = json_decode($json, true);
$questions = [];
foreach ($json_array as $key => $questions);
$noOfQuestions = count($questions);

if (!isset($_POST["submitFeedback"]))
    header("Location:index.php");

$response = [];
for ($i = 1; $i <= $noOfQuestions; $i++) {
    $response["q" . $i . "Rating"] = $_POST["q$i" . "Rating"];
    $response["q" . $i . "Review"] = $_POST["q$i" . "Text"];
}
$response["dateSubmitted"] = date('Y-m-d H:i:s');


//Fetching old values for entry from responses.json file
$json = file_get_contents("json/responses.json");
$json_array = json_decode($json, true);
//Create temporary json file to update values
$fp = fopen('json/responses_temp.json', 'w');
fwrite($fp, "[");
$len = count($json_array);
foreach ($json_array as $key => $array) {
    $len--;
    fwrite($fp, json_encode($array));
    if ($len != 0)
        fwrite($fp, ",");
}
fwrite($fp, json_encode($response));
fwrite($fp, "]");
fclose($fp);

//delete old json file
unlink("json/responses.json");
//make temporary file main file
rename("json/responses_temp.json", "json/responses.json");
$message = "Your response has been received.";
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
            Thank you for your feedback</div>
        <div class="container" style="padding: 2rem;background-color: #e6f1ff;border-radius: 0.75rem;">
            <div class="row">
                <div class="col col-12">
                    Your response has been received.
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/rating.js"></script>
</body>

</html>