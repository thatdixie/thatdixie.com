<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_instrument.php";

/********************************************************************
 * Editor_collection_instrumentModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_instrument class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_instrumentModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_instrument VIEW
     *
     * @return editor_collection_instrument
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "instrument ".                      		               
	       "FROM editor_collection_instrument ";
        return($this->selectDB($query, "Editor_collection_instrument"));
    }
}

?>