<?php
// Get the experiment id parameter from the URL
$eid = isset($_GET['eid']) ? $_GET['eid'] : 0;

// Get the number of experiments completed parameter from the URL
$ec = isset($_GET['ec']) ? $_GET['ec'] : 0;

// Get the token parameter from the URL
$token = isset($_GET['token']) ? $_GET['token'] : '';

// Define the two external URLs to redirect the user to
$urls = array(
    'http://localhost:8080',
    'https://www.testable.org/experiment/11502/795217/start'
);

// Define the URL to redirect the user to after completing two experiments
$redirect_url = "https://fhss2.athabascau.ca/survey/index.php/226932?newtest=Y&lang=en&226932X492X5636=Y";

// If the user has completed two experiments, redirect them to the experiment page
if ($ec >= 2) {
    header("Location: $redirect_url&token=$token");
    exit();
}

// If the experiment id is 1 or 2, increment the number of experiments completed and redirect the user to the other experiment
if ($eid == 1) {
    $url = $urls[1];
    $eid = 2;
    $ec++;
    header("Location: $url?eid=$eid&ec=$ec&token=$token");
    exit();
} elseif ($eid == 2) {
    $url = $urls[0];
    $eid = 1;
    $ec++;
    header("Location: $url?eid=$eid&ec=$ec&token=$token");
    exit();
}

// If the experiment id is 0, randomly redirect the user to one of the two URLs and set the experiment id accordingly
$url_index = array_rand($urls);
$url = $urls[$url_index];
$eid = $url_index + 1;
$ec++;
header("Location: $url?eid=$eid&ec=$ec&token=$token");
exit();
?>


