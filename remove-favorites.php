<?php

session_start();

// Include painting data and functions
include 'includes/data.inc.php';

// Check if the 'id' query parameter exists
if (!isset($_GET['id'])) {
    echo json_encode(["error" => "No painting ID provided."]);
    exit();
}

// Get the painting ID from the query string
$id = $_GET['id'];

if ($id=="ALL") {
    unset($_SESSION['favorites']);

}
elseif (isset($_SESSION['favorites'][$id])) {
    //echo json_encode(["info" => "Painting is already in favorites."]);
    unset($_SESSION['favorites'][$id]);
}
# header("Location: browse-paintings.php")
header("Location: view-favorites.php")
?>