<?php

require_once "../include/view/page/admin/index.inc";
require_once "../include/etc/session.php";
require_once "../include/etc/sql.php";
require_once "../include/controller/admin/admin.inc";

siteSession();

if(isDixieSessionOk())
{
    if(getRequest("func") == "view")
    {    
        viewContact(getRequest("id"));
    }
    elseif(getRequest("func") == "mark_read")
    {    
        markRead(getRequest("id"));
    }
    elseif(getRequest("func") == "mark_unread")
    {    
        markUnread(getRequest("id"));
    }
    elseif(getRequest("func") == "delete")
    {
        if(getRequest("confirm") == "yes")
        {    
            deleteContact(getRequest("id"));
        }
        else
        {
            deleteConfirm(getRequest("id"));
        }    
    }    
    elseif(getRequest("func") == "findcontacts")
    {
        adminFindContacts();        
    }
    else
    {
        viewManageContactsHome();
    }
}
else
{
    redirect("/admin/login.cgi?dest=managecontacts.php");
}

/*
 *********************************
 * view contact                  
 * @author megan    
 * @param  int $id               
 *********************************
 */ 
function viewContact($id)
{
    require_once "../include/model/ContactModel.php";

    $db       = new ContactModel();
    $contacts = $db->find($id);
    $contact  = $contacts[0];
    
    head();
    nav();
    viewEditContact($contact);
    foot();
}

/*
 *********************************
 * mark as read                  
 * @author megan    
 * @param  int $id               
 *********************************
 */ 
function markRead($id)
{
    require_once "../include/model/ContactModel.php";

    $db       = new ContactModel();
    $contacts = $db->find($id);
    $contact  = $contacts[0];
    $contact->contactStatus = 'READ';
    $contact->contactModified = sqlNow();
    $db->update($contact);
    
    viewContact($id);
}

/*
 *********************************
 * mark as unread                  
 * @author megan    
 * @param  int $id               
 *********************************
 */ 
function markUnread($id)
{
    require_once "../include/model/ContactModel.php";

    $db       = new ContactModel();
    $contacts = $db->find($id);
    $contact  = $contacts[0];
    $contact->contactStatus = 'UNREAD';
    $contact->contactModified = sqlNow();
    $db->update($contact);
    
    viewContact($id);
}

/*
 *********************************
 * delete contact                  
 * @author megan    
 * @param  int $id               
 *********************************
 */ 
function deleteContact($id)
{
    require_once "../include/model/ContactModel.php";
    require_once "../include/view/kissyface.php";

    $db       = new ContactModel();
    $db->delete($id);
    kissyFace("Contact Deleted", "/admin/managecontacts.php");
}

/*
 *********************************
 * delete confirm                  
 * @author megan    
 * @param  int $id               
 *********************************
 */ 
function deleteConfirm($id)
{
    require_once "../include/model/ContactModel.php";

    $db       = new ContactModel();
    $contacts = $db->find($id);
    $contact  = $contacts[0];
    
    head();
    nav();
    viewDeleteContact($contact);
    foot();
}

/*
************************************
 * search contacts by date/name/... 
 * @author megan                 
 ***********************************
 */ 
function adminFindContacts()
{
    require_once "../include/model/AdminContactModel.php";

    $search_key = getRequest('search_key');
    
    $db       = new AdminContactModel();
    $contacts = $db->findBySearch($search_key);
    
    head();
    nav();
    findContacts($contacts);
    foot();
}

/*
 *********************************
 * view manage contact home page 
 * @author megan                 
 *********************************
 */ 
function viewManageContactsHome()
{
    require_once "../include/model/GetUnreadModel.php";

    $db       = new GetUnreadModel();
    $contacts = $db->select();
    
    head();
    nav();
    manageContactsHome($contacts);
    foot();
}
?>





