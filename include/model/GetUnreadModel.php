<?php
//$root = realpath($_SERVER['DOCUMENT_ROOT']);
//require_once $root."/include/etc/sql.php";
require_once "DixieDB.php";
require_once "ContactModel.php";
require      "GetUnread.php";

/********************************************************************
 * GetUnreadModel inherits DixieDB and provides the select() 
 * function which maps the GetUnread class/VIEW in dixieDB.
 *
 * @author  megan
 * @version 180712
 *********************************************************************
 */
class GetUnreadModel extends DixieDB
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
            $where = " contactName COLLATE UTF8_GENERAL_CI LIKE '%".$key."%' ".
                        "OR contactEmail   COLLATE UTF8_GENERAL_CI LIKE '%".$key."%' ".
                        "OR contactSubject COLLATE UTF8_GENERAL_CI LIKE '%".$key."%' ".
                        "OR contactCompany COLLATE UTF8_GENERAL_CI LIKE '%".$key."%' ";
        }
        else
        {
            $where = "contactStatus='UNREAD' OR contactStatus='READ' ";
        }
          
        $query="SELECT contactId,".
                      "contactName,".
                      "contactEmail,".
                      "contactPhone,".
                      "contactCompany,".
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

     /*********************************************************
     * Returns  GetUnread VIEW
     *
     * @return getUnread
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "contactId,".
                      "contactName,".
                      "contactEmail,".
                      "contactPhone,".
                      "contactSubject,".
                      "contactMessage,".
                      "contactSource,".
                      "contactCreated,".
                      "contactModified,".
                      "contactStatus ".                      		               
	       "FROM getUnread ";
        return($this->selectDB($query, "GetUnread"));
    }
}

?>