<?php
require_once "MusicbrainzDB.php";
require      "Series_gid_redirect.php";

/********************************************************************
 * Series_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Series_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Series_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Series_gid_redirect VIEW
     *
     * @return series_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM series_gid_redirect ";
        return($this->selectDB($query, "Series_gid_redirect"));
    }
}

?>