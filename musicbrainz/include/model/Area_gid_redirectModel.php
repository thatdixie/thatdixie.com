<?php
require_once "MusicbrainzDB.php";
require      "Area_gid_redirect.php";

/********************************************************************
 * Area_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Area_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Area_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Area_gid_redirect VIEW
     *
     * @return area_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM area_gid_redirect ";
        return($this->selectDB($query, "Area_gid_redirect"));
    }
}

?>