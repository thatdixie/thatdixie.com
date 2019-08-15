<?php
require_once "MusicbrainzDB.php";
require      "Editor_watch_release_group_type.php";

/********************************************************************
 * Editor_watch_release_group_typeModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_watch_release_group_type class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_watch_release_group_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_watch_release_group_type VIEW
     *
     * @return editor_watch_release_group_type
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "editor,".
                      "release_group_type ".                      		               
	       "FROM editor_watch_release_group_type ";
        return($this->selectDB($query, "Editor_watch_release_group_type"));
    }
}

?>