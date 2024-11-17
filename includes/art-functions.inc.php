<?php

define("UTF_Encoding", "UTF-8");

define("ISO_Encoding", "ISO-8859-1");

function generateReviewStars($rating) {
  $output = "";
  for ($i=0; $i<$rating; $i++) {
    $output .= '<i class="star icon"></i>';
  }
  return $output;
}


function generateRatingStars($rating) {
  $output = "";
  for ($i=0; $i<$rating; $i++) {
    $output .= '<i class="orange star icon"></i>';
  }
  for ($i=$rating; $i<5; $i++) {
    $output .= '<i class="empty star icon"></i>';
  }
  
  return $output;
}


function generateLink($url,$label) {
    return "<a href='$url'>$label</a>";
}



function outputFilterOptions($data, $valueField, $dataField) {
  while ($single = $data->fetch()) { 
    echo '<option value=' . $single[$valueField] . '>';
    echo  mb_convert_encoding($single[$dataField]);
    echo '</option>'; 
  }       
}

function makeArtistName($first, $last) {
    return  mb_convert_encoding($first . ' ' . $last, UTF_Encoding, ISO_Encoding);
}

?>