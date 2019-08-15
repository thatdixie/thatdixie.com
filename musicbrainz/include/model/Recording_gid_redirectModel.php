<?php
require_once "MusicbrainzDB.php";
require      "Recording_gid_redirect.php";

/********************************************************************
 * Recording_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Recording_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Recording_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Recording_gid_redirect VIEW
     *
     * @return recording_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM recording_gid_redirect ";
        return($this->selectDB($query, "Recording_gid_redirect"));
    }
}

?>