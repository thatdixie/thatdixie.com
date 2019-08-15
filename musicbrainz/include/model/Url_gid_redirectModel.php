<?php
require_once "MusicbrainzDB.php";
require      "Url_gid_redirect.php";

/********************************************************************
 * Url_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Url_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Url_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Url_gid_redirect VIEW
     *
     * @return url_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM url_gid_redirect ";
        return($this->selectDB($query, "Url_gid_redirect"));
    }
}

?>