<?php
require_once "MusicbrainzDB.php";
require      "Edit_note_recipient.php";

/********************************************************************
 * Edit_note_recipientModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_note_recipient class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_note_recipientModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_note_recipient VIEW
     *
     * @return edit_note_recipient
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "recipient,".
                      "edit_note ".                      		               
	       "FROM edit_note_recipient ";
        return($this->selectDB($query, "Edit_note_recipient"));
    }
}

?>