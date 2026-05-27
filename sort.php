<?php

class Sort
{

    public array $arr;

    public function __construct()
    {
        for($i = 0; $i < 10000; $i++) {
            $this->arr[$i] = rand(0, 10);
        }
    }

    public function bubbleSort()
    {

        $arr = $this->arr;
        $time_start = microtime(true);

        for ($i = 0; $i < count($arr); $i++) {
            for ($x = 0; $x < count($arr); $x++) {
                if ($arr[$i] < $arr[$x]) {
                    $aux = $arr[$i];
                    $arr[$i] = $arr[$x];
                    $arr[$x] = $aux;
                }
            }
        }

        $time_end = microtime(true);
        $time = $time_end - $time_start;


        echo "Tiempo bubble sort: $time\n";
    }


    public function insertionSort()
    {
        $arr = $this->arr;
        $time_start = microtime(true);

        for ($i = 1; $i < count($arr); $i++) {
            for ($x = 0; $x < $i; $x++) {
                if ($arr[$i] < $arr[$x]) {
                   $aux = $arr[$x];
                   $arr[$x] = $arr[$i];
                   $arr[$i] = $aux;
                }
            }
        }

        $time_end = microtime(true);
        $time = $time_end - $time_start;

        echo "Tiempo insertion sort: $time\n";
    }

    public function selectionSort()
    {
        $arr = $this->arr;
        $time_start = microtime(true);

        for ($i = 0; $i < count($arr); $i++) {
            $min = $arr[$i];
            $minIndex = $i;

            for ($x = $i + 1; $x < count($arr); $x++) {
                if (isset($arr[$x]) && $arr[$x] < $min) {
                    $min = $arr[$x];
                    $minIndex = $x;
                }
            }

            $aux = $arr[$i];
            $arr[$i] = $min;
            $arr[$minIndex] = $aux;
        }

        $time_end = microtime(true);
        $time = $time_end - $time_start;

        echo "Tiempo selection sort: $time\n";
    }
}

$sort = new Sort();
$sort->bubbleSort();
$sort->insertionSort();
$sort->selectionSort();