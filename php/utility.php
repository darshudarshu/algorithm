<?php
class Utility
{   // to get valid interger
    public function getInt()
    {
        fscanf(STDIN, '%d', $num);
        if (filter_var($num, FILTER_VALIDATE_INT)) {
            return $num;
        } else {
            echo "enter valid number  \n";
            return $this->getInt();
        }
    }
    // to find the guessing number
    public function findNum()
    {
        echo "enter the number \n";
        $number = Utility::getInt();

        $start = 0;
        $final = pow(2, $number) - 1;
        $end = pow(2, $number);
        echo "chosse the number btw " . 0 . " and " . $final . "\n";
        while ($start <= $end) {
            $mid = floor(($start + $end) / 2);
            echo "press 1 if your num is =" . $mid . "\n";
            echo "press 2 if your num is <" . $mid . "\n";
            echo "press 3 if your num is >" . $mid . "\n";
            $your = Utility::getInt();
            if ($your == 2) {
                $end = $mid - 1;
            } elseif ($your == 3) {
                $start = $mid + 1;
            } else {
                echo "your num = " . $mid . "\n";
                break;
            }
        }

    }
    // to print min no of notes required
    public function currencyNotes()
    {
        echo "eneter the amount \n";
        $amount = Utility::getInt();
        $notes = array(1000, 500, 200, 100,
            50, 20, 10, 5, 1);
        $noteCounter = array(0, 0, 0, 0, 0,
            0, 0, 0, 0, 0);

        for ($i = 0; $i < 9; $i++) {
            if ($amount >= $notes[$i]) {
                $noteCounter[$i] = intval($amount / $notes[$i]);
                $amount = $amount - $noteCounter[$i] * $notes[$i];
            }
        }
        echo ("Currency notes :" . "\n");
        for ($i = 0; $i < 9; $i++) {
            if ($noteCounter[$i] != 0) {
                echo ($notes[$i] . " : " .
                    $noteCounter[$i] . "\n");
            }
        }
    }
    // to print which day
    public function date()
    {
        echo "enter the date \n";
        fscanf(STDIN, '%d', $d);
        echo "enter the month \n";
        fscanf(STDIN, '%d', $m);
        echo "enter the year \n";
        fscanf(STDIN, '%d', $y);
        $yo = $y - floor((14 - $m) / 12);
        $x = $yo + floor($yo / 4)-floor($yo / 100) + floor($yo / 400);
        $mo = $m + 12 * floor((14 - $m) / 12) - 2;
        $do = floor($d + $x + 31 * $mo / 12) % 7;
        $weekdays = array("sunday", "monday", "tuesday", "wednesday",
            "thursday", "friday", "saturday");

        echo "the given day = " . $weekdays[$do] . "\n";
    }
    //temperature conversion
 public function temperature()
    {
        echo "enter 1 get (Celsius to fahrenheit) \n";
        echo "enter 2 get (fahrenheit to Celsius) \n";
        $coverion = Utility::getInt();
        switch ($coverion) {
            case 1:
                echo "enter temp in Celsius \n";
                fscanf(STDIN, '%f', $c);
                $f = ($c * 9 / 5) + 32;
                echo "temp in fahrenheit =" . $f . "'C\n";
                break;
            case 2:
                echo "enter temp in fahrenheit \n";
                fscanf(STDIN, '%f', $f);
                $c = ($f - 32) * 5 / 9;
                echo "temp in fahrenheit =" . $c . "'F\n";
                break;
            default:
                echo "invalid input \n";
                Utility::temperature();
                break;
        }
    }
    //money need to pay
    public function payment()
    {
        echo "enter the principle \n";
        fscanf(STDIN, '%d', $P);
        echo "enter the year \n";
        fscanf(STDIN, '%d', $Y);
        echo "enter the rate \n";
        fscanf(STDIN, '%d', $R);
        $r = $R / (12 * 100);
        $n = 12 * $Y;
        $payment = $P * $r / (1 - pow((1 + $r), -$n));
        echo "the payment need pay is = " . $payment . "\n";
    }
    //finding sqrt using newtons formula
    public function sqrt()
    {
        echo "enter the non negative number \n";
        fscanf(STDIN, '%d', $value);
        if ($value >= 0) {
            $epsilon = 1e-15;
            $t = $value;
            while (abs($t - $value / $t) > $epsilon * $t) {
                $t = ($value / $t + $t) / 2;
            }
            echo "sqrt of " . $value . " is " . $t . "\n";

        } else {
            echo "invalid num \n";
            Utility::sqrt();
        }
    }
    //conversion of decimal to binary
    public function toBinary()
    {

        echo "Enter +ve decimal  number \n";
        $number = Utility::getInt();
        $temp = $number;
        $reminder = 0;
        $multiplier = 1;
        $binary = 0;
        while ($number >= 1) {
            $reminder = $number % 2;
            $binary = $binary + $reminder * $multiplier;
            $number = $number / 2;
            $multiplier = $multiplier * 10;
        }
        echo "Binary value of " . $temp . " is " . $binary . "\n";
    }
    // swaping nibbles
    public function swap()
    {
        echo "enter the non negative number \n";
        fscanf(STDIN, '%d', $swapnum);
        $result = (($swapnum & 0x0F) << 4 | ($swapnum & 0xF0) >> 4);
        if (($result & ($result - 1)) == 0 && $swapnum != 0) {

            echo "the swapped number is = " . $result . " is power of 2 \n";
        } else {
            echo "the swapped number is = " . $result . " is not power of 2 \n";
        }
    }
    // searching a user element
    public function binarySearch()
    {
        // calling the one sorting function
        $sortedArray = Utility::insertionSort();
        echo "enter the seach element \n";
        $search = readline();
        $check = Utility::binSearch($sortedArray, $search);
        if ($check) {
            echo "the element found \n";
        } else {
            echo "the element not found \n";
        }
    }
    // searching logic by passing sorted array
    public function binSearch($sortedArray, $search)
    {

        if (count($sortedArray) === 0) {
            return false;
        }
        $low = 0;
        $high = count($sortedArray) - 1;

        while ($low <= $high) {

            $mid = floor(($low + $high) / 2);

            if ($sortedArray[$mid] == $search) {
                return true;
            }

            if ($search < $sortedArray[$mid]) {

                $high = $mid - 1;
            } else {

                $low = $mid + 1;
            }
        }
        return false;
    }
    //insertion sort for array of integer
    public function insertionSort()
    {
        $arr = array();
        echo "enter the size \n";
        $size = Utility::getInt();
        echo "enter the elements \n";
        for ($i = 0; $i < $size; $i++) {
            $arr[$i] = readline();
        }
        for ($i = 0; $i < count($arr); $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0 && $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $key;
        }
        return $arr;
    }
    //taking in put for sorting
    public function insertionSortt()
    {
        $arr = array();
        echo "enter the size \n";
        $size = Utility::getInt();
        echo "enter the elements \n";
        for ($i = 0; $i < $size; $i++) {
            $arr[$i] = Utility::getInt();
        }
        for ($i = 0; $i < count($arr); $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0 && $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $key;
        }
        echo "sorted elements are \n" ;
        for ($i = 0; $i < count($arr); $i++) {
            echo $arr[$i] . "\n" ;
        }
    }
}