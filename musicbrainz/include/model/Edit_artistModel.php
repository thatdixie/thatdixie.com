<?php
require_once "MusicbrainzDB.php";
require      "Edit_artist.php";

/********************************************************************
 * Edit_artistModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_artist class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_artistModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_artist VIEW
     *
     * @return edit_artist
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "artist,".
                      "status ".                      		               
	       "FROM edit_artist ";
        return($this->selectDB($query, "Edit_artist"));
    }
}

?>