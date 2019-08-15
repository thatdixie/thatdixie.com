<?php
require_once "MusicbrainzDB.php";
require      "Release_gid_redirect.php";

/********************************************************************
 * Release_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_gid_redirect VIEW
     *
     * @return release_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM release_gid_redirect ";
        return($this->selectDB($query, "Release_gid_redirect"));
    }
}

?>