<?php
require_once "MusicbrainzDB.php";
require      "Edit_release.php";

/********************************************************************
 * Edit_releaseModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_release class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_release VIEW
     *
     * @return edit_release
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "release ".                      		               
	       "FROM edit_release ";
        return($this->selectDB($query, "Edit_release"));
    }
}

?>