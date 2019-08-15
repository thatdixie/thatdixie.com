<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_recording.php";

/********************************************************************
 * Editor_collection_recordingModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_recording class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_recordingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_recording VIEW
     *
     * @return editor_collection_recording
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "recording ".                      		               
	       "FROM editor_collection_recording ";
        return($this->selectDB($query, "Editor_collection_recording"));
    }
}

?>