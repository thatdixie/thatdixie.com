<?php
require_once "MusicbrainzDB.php";
require      "Editor_subscribe_label_deleted.php";

/********************************************************************
 * Editor_subscribe_label_deletedModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_subscribe_label_deleted class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_subscribe_label_deletedModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_subscribe_label_deleted VIEW
     *
     * @return editor_subscribe_label_deleted
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "editor,".
                      "gid,".
                      "deleted_by ".                      		               
	       "FROM editor_subscribe_label_deleted ";
        return($this->selectDB($query, "Editor_subscribe_label_deleted"));
    }
}

?>