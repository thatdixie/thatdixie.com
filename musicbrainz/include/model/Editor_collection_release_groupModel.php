<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_release_group.php";

/********************************************************************
 * Editor_collection_release_groupModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_release_group class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_release_groupModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_release_group VIEW
     *
     * @return editor_collection_release_group
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "release_group ".                      		               
	       "FROM editor_collection_release_group ";
        return($this->selectDB($query, "Editor_collection_release_group"));
    }
}

?>