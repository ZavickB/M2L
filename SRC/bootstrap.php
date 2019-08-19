<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function dd(...$vars){
    foreach($vars as $var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    }
}
function h(string $value){
    return htmlentities($value);
}