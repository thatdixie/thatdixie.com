<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_event.php";

/********************************************************************
 * Editor_collection_eventModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_event class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_eventModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_event VIEW
     *
     * @return editor_collection_event
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "event ".                      		               
	       "FROM editor_collection_event ";
        return($this->selectDB($query, "Editor_collection_event"));
    }
}

?>