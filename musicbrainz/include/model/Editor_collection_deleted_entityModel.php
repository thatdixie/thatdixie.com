<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_deleted_entity.php";

/********************************************************************
 * Editor_collection_deleted_entityModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_deleted_entity class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_deleted_entityModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_deleted_entity VIEW
     *
     * @return editor_collection_deleted_entity
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "gid ".                      		               
	       "FROM editor_collection_deleted_entity ";
        return($this->selectDB($query, "Editor_collection_deleted_entity"));
    }
}

?>