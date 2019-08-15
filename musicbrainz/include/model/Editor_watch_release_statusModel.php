<?php
require_once "MusicbrainzDB.php";
require      "Editor_watch_release_status.php";

/********************************************************************
 * Editor_watch_release_statusModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_watch_release_status class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_watch_release_statusModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_watch_release_status VIEW
     *
     * @return editor_watch_release_status
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "editor,".
                      "release_status ".                      		               
	       "FROM editor_watch_release_status ";
        return($this->selectDB($query, "Editor_watch_release_status"));
    }
}

?>