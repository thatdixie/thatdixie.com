<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_area.php";

/********************************************************************
 * Editor_collection_areaModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_area class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_areaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_area VIEW
     *
     * @return editor_collection_area
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "area ".                      		               
	       "FROM editor_collection_area ";
        return($this->selectDB($query, "Editor_collection_area"));
    }
}

?>