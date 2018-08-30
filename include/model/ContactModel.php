<?php
require_once "DixieDB.php";
require      "Contact.php";

/********************************************************************
 * ContactModel inherits DixieDB and provides functions to
 * map Contact class to dixieDB.
 *
 * @author  megan
 * @version 180712
 *********************************************************************
 */
class ContactModel extends DixieDB
{
    /*********************************************************
     * Returns a Contact by contactId
     *
     * @return contact
     *********************************************************
     */
    public function find($id)
    {
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
	       "WHERE contactId=".$id;

        return($this->selectDB($query, "Contact"));
    }

    /*********************************************************
     * Insert a new Contact into dixieDB database
     *
     * @param $contact
     * @return n/a
     *********************************************************
     */
    public function insert($contact)
    {
        $query="INSERT INTO contact ( ".
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
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($contact->contactName)."',".
                      "'".$this->sqlSafe($contact->contactEmail)."',".
                      "'".$this->sqlSafe($contact->contactPhone)."',".
                      "'".$this->sqlSafe($contact->contactSubject)."',".
                      "'".$this->sqlSafe($contact->contactMessage)."',".
                      "'".$this->sqlSafe($contact->contactSource)."',".
                      "'".$this->sqlSafe($contact->contactCreated)."',".
                      "'".$this->sqlSafe($contact->contactModified)."',".
                      "'".$this->sqlSafe($contact->contactStatus)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Contact into dixieDB database
     * and return a Contact with new autoincrement
     * primary key
     *
     * @param  $contact
     * @return $contact
     *********************************************************
     */
    public function insert2($contact)
    {
        $query="INSERT INTO contact ( ".
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
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($contact->contactName)."',".
                      "'".$this->sqlSafe($contact->contactEmail)."',".
                      "'".$this->sqlSafe($contact->contactPhone)."',".
                      "'".$this->sqlSafe($contact->contactSubject)."',".
                      "'".$this->sqlSafe($contact->contactMessage)."',".
                      "'".$this->sqlSafe($contact->contactSource)."',".
                      "'".$this->sqlSafe($contact->contactCreated)."',".
                      "'".$this->sqlSafe($contact->contactModified)."',".
                      "'".$this->sqlSafe($contact->contactStatus)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $contact->contactId = $id;
	    return($contact);	
    }


    /*********************************************************
     * Update a Contact in dixieDB database
     *
     * @param $contact
     * @return n/a
     *********************************************************
     */
    public function update($contact)
    {
        $query="UPDATE  contact ".
	          "SET ".
                      "contactId= ".$contact->contactId." ,".
                      "contactName='".$this->sqlSafe($contact->contactName)."',".
                      "contactEmail='".$this->sqlSafe($contact->contactEmail)."',".
                      "contactPhone='".$this->sqlSafe($contact->contactPhone)."',".
                      "contactSubject='".$this->sqlSafe($contact->contactSubject)."',".
                      "contactMessage='".$this->sqlSafe($contact->contactMessage)."',".
                      "contactSource='".$this->sqlSafe($contact->contactSource)."',".
                      "contactCreated='".$this->sqlSafe($contact->contactCreated)."',".
                      "contactModified='".$this->sqlSafe($contact->contactModified)."',".
                      "contactStatus='".$this->sqlSafe($contact->contactStatus)."' ".                      
	          "WHERE contactId=".$contact->contactId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Contact by contactId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM contact WHERE contactId=".$id;

        $this->executeQuery($query);
    }
}

?>