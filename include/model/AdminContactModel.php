<?php
//$root = realpath($_SERVER['DOCUMENT_ROOT']);
//require_once $root."/include/etc/sql.php";
require_once "DixieDB.php";
require_once "ContactModel.php";

/********************************************************************
 * AdminContactModel inherits ContactModel and provides the findBySearch() 
 * function which returns contact objects by any field
 *
 * @author  megan
 * @version 180802
 *********************************************************************
 */
class AdminContactModel extends ContactModel
{
    /*********************************************************
     * Returns Contact search results
     *
     * @return array contacts
     *********************************************************
     */
    public function findBySearch($key)
    {
        if(blacklistSafe($key) != "")
        {
            $where = " contactName COLLATE LATIN1_GENERAL_CI LIKE '%".$key."%' ".
                        "OR contactEmail   COLLATE LATIN1_GENERAL_CI LIKE '%".$key."%' ".
                        "OR contactSubject COLLATE LATIN1_GENERAL_CI LIKE '%".$key."%' ";
        }
        else
        {
            $where = "contactStatus='UNREAD' OR contactStatus='READ' ";
        }
          
        $query="SELECT contactId,".
                      "contactName,".
                      "contactEmail,".
                      "contactPhone,".
                      "contactSubject,".
                      "contactMessage,".
                      "contactSource,".
                      "contactCreated,".
                      "contactModified,".
                      "contactStatus ".                      		               
	       "FROM contact ".
	       "WHERE ".$where.
           "ORDER BY contactCreated DESC";

        return($this->selectDB($query, "Contact"));
    }
}
?>