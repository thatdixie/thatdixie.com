<?php
require_once "MusicbrainzDB.php";
require      "Work_gid_redirect.php";

/********************************************************************
 * Work_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Work_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Work_gid_redirect VIEW
     *
     * @return work_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM work_gid_redirect ";
        return($this->selectDB($query, "Work_gid_redirect"));
    }
}

?>