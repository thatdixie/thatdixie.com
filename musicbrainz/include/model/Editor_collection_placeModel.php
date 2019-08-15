<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_place.php";

/********************************************************************
 * Editor_collection_placeModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_place class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_placeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_place VIEW
     *
     * @return editor_collection_place
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "place ".                      		               
	       "FROM editor_collection_place ";
        return($this->selectDB($query, "Editor_collection_place"));
    }
}

?>