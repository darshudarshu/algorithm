<?php
class Sort
{
    static $time = array();
    // to get ineteger validation
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
    // binary search of an array
    public function binSearch($arr, $search, $keyy)
    {
        for ($i = 0; $i < count($arr); $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0 && $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $key;
        }
        // taking system time for binary search
        $timestarts = microtime(true);
        if (count($arr) === 0) {
            return false;
        }
        $low = 0;
        $high = count($arr) - 1;
        while ($low <= $high) {
            $mid = floor(($low + $high) / 2);
            if ($arr[$mid] == $search) {
                $timestops = microtime(true);
                // counting the time taken after search
                $exectimes = $timestops - $timestarts;

                Sort::$time[$keyy] = $exectimes * 1000000;
                return true;
            }
            if ($search < $arr[$mid]) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }
        // counting the time taken after search
        $timestops = microtime(true);
        $exectimes = $timestops - $timestarts;
        Sort::$time[$keyy] = $exectimes * 1000000;
        return false;
    }
    public function insertionSort($arr, $keyy)
    {
       // taking system time for insertion sort
        $timestarti = microtime(true);
        for ($i = 0; $i < count($arr); $i++) {
            $key = $arr[$i];
            $j = $i - 1;
            while ($j >= 0 && $arr[$j] > $key) {
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
            $arr[$j + 1] = $key;
        }
        // counting the time taken after sort
        $timestopi = microtime(true);
        $exectimei = $timestopi - $timestarti;
        Sort::$time[$keyy] = $exectimei * 1000000;

        return $arr;
    }
    public function bubbleSort($arr, $keyy)
    {
        // taking system time for bubble sort
        $timestartb = microtime(true);
        $size = count($arr);
        for ($i = 0; $i < count($arr) - 1; $i++) {
            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$i] > $arr[$j]) {
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
        // counting the time taken after sort
        $timestopb = microtime(true);
        $exectimeb = $timestopb - $timestartb;
        Sort::$time[$keyy] = $exectimeb * 1000000;

        return $arr;
    }
       // function to store corresponding time and sort type in key value pair
    public function find()
    {   
        arsort(Sort::$time);
        foreach (Sort::$time as $key => $value) {
            echo "$key => $value";
            echo "  micro sec\n";
        }

    }
}
