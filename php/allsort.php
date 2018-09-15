<?php
include "utilityTwo.php";
$print = new Sort();

$arrint = array();
$arrstr = array();
echo "enter the size \n";
$size = $print->getInt();
echo "enter the str array elements \n";
for ($i = 0; $i < $size; $i++) {
    $arrint[$i] = readline();
}
echo "enter search element \n";
$search = readline();

echo "enter the int array elements \n";
for ($i = 0; $i < $size; $i++) {
    $arrstr[$i] = $print->getInt();
}
echo "enter search element \n";
$search = $print->getInt();
// storing in a different arrays
$sarr = $arrint;
$iarr = $arrint;
$barr = $arrint;
$sarrr = $arrstr;
$iarrr = $arrstr;
$barrr = $arrstr;
// assigning different keys for different sort and search
$skey = "binary search int   =";
$ikey = "insertion sort int  =";
$bkey = "bubble sort int     =";
$sskey = "binary search str   =";
$iikey = "insertion sort str  =";
$bbkey = "bubble sort str     =";
echo "\n";
//calling sorting and searching function by passing array,search element and corresp key
$check = $print->binSearch($sarr, $search, $skey);

$barray = $print->bubbleSort($barr, $bkey);

$iarray = $print->insertionSort($iarr, $ikey);

$check = $print->binSearch($sarrr, $search, $sskey);

$barray = $print->bubbleSort($barrr, $bbkey);

$iarray = $print->insertionSort($iarrr, $iikey);

$print->find();
