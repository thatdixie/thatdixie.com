<?php
require_once "MusicbrainzDB.php";
require      "Label_gid_redirect.php";

/********************************************************************
 * Label_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Label_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Label_gid_redirect VIEW
     *
     * @return label_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM label_gid_redirect ";
        return($this->selectDB($query, "Label_gid_redirect"));
    }
}

?>