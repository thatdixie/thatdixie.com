<?php
require_once "MusicbrainzDB.php";
require      "Editor_subscribe_series_deleted.php";

/********************************************************************
 * Editor_subscribe_series_deletedModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_subscribe_series_deleted class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_subscribe_series_deletedModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_subscribe_series_deleted VIEW
     *
     * @return editor_subscribe_series_deleted
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "editor,".
                      "gid,".
                      "deleted_by ".                      		               
	       "FROM editor_subscribe_series_deleted ";
        return($this->selectDB($query, "Editor_subscribe_series_deleted"));
    }
}

?>