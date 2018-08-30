<?php

/***********************************
 * functions regarding random shit
 *
 * @author  mgill
 ***********************************
*/			


function randomString($len)
{
    $alphanum = "0123456789".
                "ABCDEFGHIJKLMNOPQRSTUVWXYZ".
                "abcdefghijklmnopqrstuvwxyz";

    $charlen   = strlen($alphanum);
    $randomStr = "";

    for($i=0; $i < $len; $i++)
        $randomStr .=$alphanum[rand(0,$charLen -1)];

    return($randomStr);
}

?>
