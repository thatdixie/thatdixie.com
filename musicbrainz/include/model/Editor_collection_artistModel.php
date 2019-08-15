<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_artist.php";

/********************************************************************
 * Editor_collection_artistModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_artist class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_artistModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_artist VIEW
     *
     * @return editor_collection_artist
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "artist ".                      		               
	       "FROM editor_collection_artist ";
        return($this->selectDB($query, "Editor_collection_artist"));
    }
}

?>