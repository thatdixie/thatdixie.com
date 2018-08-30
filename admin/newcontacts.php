<?php

require_once "../include/view/page/admin/contactsInbox.inc";
require_once "../include/etc/session.php";

siteSession();

if(isDixieSessionOk())
{
    viewNewContacts();
}
else
{
    redirect("/admin/login.cgi?dest=managecontacts.php");
}


/*
 *********************************
 * view manage contact home page *
 * @author megan                 *
 *********************************
 */ 
function viewNewContacts()
{
    require_once "../include/model/GetUnreadModel.php";
    $db = new GetUnreadModel();
    $contacts = $db->select();

    head();
    nav();
    contactsInbox($contacts);
    foot();
}
?>



