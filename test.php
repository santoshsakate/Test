<?php

/*
 * Programm : Robot Walking
 * author  : santosh <santoshsakate2@gmail.com>
 */

//receiving command line arguments as String
$strnInput = implode(' ', $argv);

$arrInput = explode(' ', $strnInput);
//echo "<pre>"; print_r($arrInput); 

//Directions Array
$arrDirections = array('NORTH', 'EAST', 'SOUTH', 'WEST');

//Starting X value
$currentX = $arrInput[1];

//Starting Y value
$currentY = $arrInput[2];

//Starting Direction 
 $currDirection = $arrInput[3];

//robot walking string Input
$strWalk = $arrInput[4];

$currDirection = array_search($currDirection, $arrDirections); 

/*------Robot Walking Started-------*/

//First Turn
$turn = $strWalk[0];

//$walkPoints = substr($strWalk,1,2);
$walkPoints = $strWalk[2];


$ChangedDirectionIndex = getDirection($arrDirections[$currDirection], $turn, $currDirection);

if($arrDirections[$ChangedDirectionIndex] == "WEST" || $arrDirections[$ChangedDirectionIndex] == "EAST"){
   $currentX = getX($arrDirections[$ChangedDirectionIndex],$currentX,$walkPoints); 
}


if($arrDirections[$ChangedDirectionIndex] == "NORTH" || $arrDirections[$ChangedDirectionIndex] == "SOUTH") {
     $currentY =getY($arrDirections[$ChangedDirectionIndex],$currentY,$walkPoints); 
}
 

$turn2 = $strWalk[3];

$ChangedDirectionIndex = getDirection($arrDirections[$ChangedDirectionIndex], $turn2, $ChangedDirectionIndex);
$walkPoints = $strWalk[5];


if($arrDirections[$ChangedDirectionIndex] == "WEST" || $arrDirections[$ChangedDirectionIndex] == "EAST"){
  $currentX = getX($arrDirections[$ChangedDirectionIndex],$currentX,$walkPoints);
}

if($arrDirections[$ChangedDirectionIndex] == "NORTH" || $arrDirections[$ChangedDirectionIndex] == "SOUTH") {
     $currentY =getY($arrDirections[$ChangedDirectionIndex],$currentY,$walkPoints);  
}

 $turn3 = $strWalk[6];

$ChangedDirectionIndex = getDirection($arrDirections[$ChangedDirectionIndex], $turn3, $ChangedDirectionIndex);

echo $currentX . ' ' . $currentY . ' ' . $arrDirections[$ChangedDirectionIndex] . "\n";
// Robot Walking :: END


//function To get Direction :: START
function getDirection($direction, $turnP, $currDirection) {
    $currDirectionIndex = NULL;
    if ($turnP == "R") {
        if ($currDirection == 3) {
            $currDirectionIndex = 0;
        } else {
            $currDirectionIndex = $currDirection + 1;
        }
    } else if ($turnP == "L") {
        if ($currDirection == 0) {
            $currDirectionIndex = 3;
        } else {
            $currDirectionIndex = $currDirection - 1;
        }
    }
    return $currDirectionIndex;
}
//function To get Direction :: END

//Function To get X - value :: START
function getX($strDirection,$currentX,$walkPoints){
   if ($strDirection == "WEST") {
    $currentX = $currentX - $walkPoints;
} else if ($strDirection == "EAST") {
    $currentX = $currentX + $walkPoints;
}
return $currentX;
}
//Function To get X - value :: END


//function to get Y :: START
function getY($strDirection,$currentY,$walkPoints) {  
    if ($strDirection == "NORTH") {
        $currentY = $currentY + $walkPoints;
    } else if(($strDirection == "SOUTH")) {
         $currentY = $currentY - $walkPoints;
    }
    return $currentY;
}
//function to get Y :: END

?>
