<?php

/***********************************
 * admin login for thatdixie.com
 *
 * @author  megan
 ***********************************
*/
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once $root."/include/etc/config.php";

/*
 * checks if user login is OK
 *
 * @return bool
**/			
function isDixieSessionOk()
{
    if(isset($_COOKIE['dixie-session']))
    {
        $p=$_COOKIE['dixie-session'];
        $json=file_get_contents(serverAddress()."/admin/login.cgi?restRequest=isDixieSession&sessionKey=".$p);
        $r=json_decode($json, TRUE);
        if($r['response'] == 'yes')
        {
            $_SESSION['username'] = $r['user'];
            return(true);
        }
        else
        {
            return(false);
        }
    }
    else
    {
        return(false);
    }
            
}

?>
