<?php
require_once "MusicbrainzDB.php";
require      "Edit_recording.php";

/********************************************************************
 * Edit_recordingModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_recording class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_recordingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_recording VIEW
     *
     * @return edit_recording
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "recording ".                      		               
	       "FROM edit_recording ";
        return($this->selectDB($query, "Edit_recording"));
    }
}

?>