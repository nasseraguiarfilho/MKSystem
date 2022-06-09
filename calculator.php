<?php

    $n1 = $_POST['num1'];
    $n2 = $_POST['num2'];
    $op = $_POST['operator'];

    if ($op == '+') {
        $result = $n1 + $n2;
    } elseif ($op == '-') {
        $result = $n1 - $n2;
    } elseif ($op == '*') {
        $result = $n1 * $n2;
    } elseif ($op == '/') {
        $result = $n1 / $n2;
    } else {
        $result = 'Invalid operator';
    }

    
    

?>