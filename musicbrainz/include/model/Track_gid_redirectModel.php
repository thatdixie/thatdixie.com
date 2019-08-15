<?php
require_once "MusicbrainzDB.php";
require      "Track_gid_redirect.php";

/********************************************************************
 * Track_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Track_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Track_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Track_gid_redirect VIEW
     *
     * @return track_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM track_gid_redirect ";
        return($this->selectDB($query, "Track_gid_redirect"));
    }
}

?>