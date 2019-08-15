<?php
require_once "MusicbrainzDB.php";
require      "Edit_release_group.php";

/********************************************************************
 * Edit_release_groupModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_release_group class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_release_groupModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_release_group VIEW
     *
     * @return edit_release_group
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "release_group ".                      		               
	       "FROM edit_release_group ";
        return($this->selectDB($query, "Edit_release_group"));
    }
}

?>