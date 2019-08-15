<?php
require_once "MusicbrainzDB.php";
require      "Editor_watch_preferences.php";

/********************************************************************
 * Editor_watch_preferencesModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_watch_preferences class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_watch_preferencesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_watch_preferences VIEW
     *
     * @return editor_watch_preferences
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "editor,".
                      "notify_via_email,".
                      "notification_timeframe,".
                      "last_checked ".                      		               
	       "FROM editor_watch_preferences ";
        return($this->selectDB($query, "Editor_watch_preferences"));
    }
}

?>