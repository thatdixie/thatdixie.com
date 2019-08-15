<?php
require_once "MusicbrainzDB.php";
require      "Artist_gid_redirect.php";

/********************************************************************
 * Artist_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Artist_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Artist_gid_redirect VIEW
     *
     * @return artist_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM artist_gid_redirect ";
        return($this->selectDB($query, "Artist_gid_redirect"));
    }
}

?>