<?php

// The stock span problem is a financial problem where we have a series of N daily price quotes for a stock and we need to calculate the span of the stock’s price for all N days. The span Si of the stock’s price on a given day i is defined as the maximum number of consecutive days just before the given day, for which the price of the stock on the current day is less than its price on the given day. 

$prices = [4, 6, 1, 8, 90, 4, 1, 54, 59, 199];
$span = array(count($prices));

for ($i = 0; $i < count($prices); $i ++){
    $span[$i] = 1;

    for($j = $i - 1; ($prices[$j] <= $prices[$i]) && ($j >= 0); $j --){
        $span[$i]++;
    }
}

print_r($span);