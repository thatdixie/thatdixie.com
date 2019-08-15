<?php
require_once "MusicbrainzDB.php";
require      "Edit_work.php";

/********************************************************************
 * Edit_workModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_work class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_work VIEW
     *
     * @return edit_work
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "work ".                      		               
	       "FROM edit_work ";
        return($this->selectDB($query, "Edit_work"));
    }
}

?>