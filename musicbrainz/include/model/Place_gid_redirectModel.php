<?php
require_once "MusicbrainzDB.php";
require      "Place_gid_redirect.php";

/********************************************************************
 * Place_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Place_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Place_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Place_gid_redirect VIEW
     *
     * @return place_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM place_gid_redirect ";
        return($this->selectDB($query, "Place_gid_redirect"));
    }
}

?>