<?php
session_start();
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
include 'apis/models/exercise_model.php';
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://exercisedb.p.rapidapi.com/exercises?limit=500",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: exercisedb.p.rapidapi.com",
        "X-RapidAPI-Key: f21cc5fcb1msh20acb55f4705de6p177a89jsn8c88713d59e3"
    ],
]);


$response = curl_exec($curl);
$err = curl_error($curl);


if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $exerciseData = json_decode($response, true);

    $exerciseList = [];

    foreach ($exerciseData as $exerciseItem) {
        $exercise = new Exercise(
            $exerciseItem['bodyPart'],
            $exerciseItem['equipment'],
            $exerciseItem['gifUrl'],
            $exerciseItem['id'],
            $exerciseItem['name'],
        );
        array_push($exerciseList, $exercise);
    }


    $_SESSION['listOfExercises'] = $exerciseList;
}
