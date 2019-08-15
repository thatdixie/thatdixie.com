<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_release.php";

/********************************************************************
 * Editor_collection_releaseModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_release class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_release VIEW
     *
     * @return editor_collection_release
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "release ".                      		               
	       "FROM editor_collection_release ";
        return($this->selectDB($query, "Editor_collection_release"));
    }
}

?>