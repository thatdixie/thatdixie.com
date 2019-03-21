<?php

require_once "../include/etc/session.php";
require_once "../include/etc/email/email.php";
siteSession();

if(isCaptchaOK())
{
    //------------------------------
    // CAPTCHA validated...
    //------------------------------
    require "../include/etc/sql.php";
    require "../include/view/views.php";
    require "../include/model/ContactModel.php";

    $contact                 = new Contact("");
    $contact->contactName    = $_SESSION['contactName'];
    $contact->contactEmail   = $_SESSION['contactEmail'];
    $contact->contactPhone   = $_SESSION['contactPhone'];
    $contact->contactSubject = $_SESSION['contactSubject'];
    $contact->contactMessage = $_SESSION['contactMessage'];

    $contact->contactCreated = sqlNow();
    $contact->contactModified= sqlNow();
    $contact->contactSource  = "CONTACT_FORM";
    $contact->contactStatus  = "UNREAD";
    $contact->contactId      = null;

    $db = new ContactModel();
    $db->insert($contact);

    //---------------------------------
    // notify system administrators
    //---------------------------------
    dixieNotify($contact);

    //---------------------------------
    // send Thank you message and
    // redirect to user home page
    //---------------------------------
    setCaptchaNOTOK();
    kissyFace("Thank You!", "/");  
}
else
{
    //------------------------------
    // CAPTCHA not validated yet...
    //------------------------------
    require "../include/view/page/captcha/index.inc";
    $_SESSION['contactName']    = $_REQUEST['name'];
    $_SESSION['contactEmail']   = $_REQUEST['email'];
    $_SESSION['contactPhone']   = $_REQUEST['phone'];
    $_SESSION['contactSubject'] = $_REQUEST['subject'];
    $_SESSION['contactMessage'] = $_REQUEST['message'];
    
    $_SESSION['captchaPage']    = "/contacts/contact.php";

    //--------------------------------
    // This is the captcha page...
    //--------------------------------
    redirect("/captcha/getcaptcha.php"); 
}

function dixieNotify($contact)
{
    $senderAdmin = "cyrusface@gmail.com";
    error_log($senderAdmin." sent\n", 0);
    $email = new Email();
    $email->senderName   = "thatdixie.com";
    $email->toEmail      = $senderAdmin;
    $email->toName       = "Megan Williams";
    $email->subject      = $contact->contactName." posted up.";
    $email->body         = "Name: ".$contact->contactName."<br>".
                           "Email: ".$contact->contactEmail."<br>".
                           "Phone: ".$contact->contactPhone."<br>".
                           "Company: ".$contact->contactCompany."<br>".
                           "Subject: ".$contact->contactSubject."<br>".
                           "<br>".
                           "Message: ".$contact->contactMessage;
    
    $email->send();
}
?>


