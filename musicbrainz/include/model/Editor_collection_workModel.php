<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_work.php";

/********************************************************************
 * Editor_collection_workModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_work class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_work VIEW
     *
     * @return editor_collection_work
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "work ".                      		               
	       "FROM editor_collection_work ";
        return($this->selectDB($query, "Editor_collection_work"));
    }
}

?>