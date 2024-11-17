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

// Search for the painting with the given ID
$painting = null;
foreach ($paintings as $p) {
    if ($p['PaintingID'] == $id) {
        $painting = $p;
        break;
    }
}

// If the painting ID is invalid, return an error
if (!$painting) {
    echo json_encode(["error" => "Painting not found."]);
    exit();
}

// Check if the 'favorites' session key exists; if not, initialize it
if (!isset($_SESSION['favorites'])) {
    $_SESSION['favorites'] = [];
}

// Add the painting to the favorites list if it doesn't already exist
if (!isset($_SESSION['favorites'][$id])) {
    $_SESSION['favorites'][$id] = [
        'PaintingID' => $painting['PaintingID'],
        'Title' => $painting['Title'],
        'ImageFileName' => $painting['ImageFileName']
    ];
    //echo json_encode(["success" => "Painting added to favorites."]);
} else {
    //echo json_encode(["info" => "Painting is already in favorites."]);
    unset($_SESSION['favorites'][$id]);
}
# header("Location: browse-paintings.php")
header("Location: view-favorites.php")
?>
