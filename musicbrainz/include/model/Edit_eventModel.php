<?php
require_once "MusicbrainzDB.php";
require      "Edit_event.php";

/********************************************************************
 * Edit_eventModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_event class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_eventModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_event VIEW
     *
     * @return edit_event
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "event ".                      		               
	       "FROM edit_event ";
        return($this->selectDB($query, "Edit_event"));
    }
}

?>