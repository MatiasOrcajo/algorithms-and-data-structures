<?php

class CustomException extends Exception
{

}

function valid_division($x, $y) {

    if($y != 0) {
        return true;
    }
    else {
        throw new CustomException("Why should not be equal to 0");

    }
}

try {
    valid_division(2, 0);
} catch (Exception $e) {
    echo $e->getMessage();
}


