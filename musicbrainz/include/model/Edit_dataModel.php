<?php
require_once "MusicbrainzDB.php";
require      "Edit_data.php";

/********************************************************************
 * Edit_dataModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_data class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_dataModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_data VIEW
     *
     * @return edit_data
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "data ".                      		               
	       "FROM edit_data ";
        return($this->selectDB($query, "Edit_data"));
    }
}

?>