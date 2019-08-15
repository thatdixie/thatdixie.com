<?php
require_once "MusicbrainzDB.php";
require      "Editor_watch_artist.php";

/********************************************************************
 * Editor_watch_artistModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_watch_artist class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_watch_artistModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_watch_artist VIEW
     *
     * @return editor_watch_artist
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "artist,".
                      "editor ".                      		               
	       "FROM editor_watch_artist ";
        return($this->selectDB($query, "Editor_watch_artist"));
    }
}

?>