<?php
require_once "MusicbrainzDB.php";
require      "Edit_area.php";

/********************************************************************
 * Edit_areaModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_area class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_areaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_area VIEW
     *
     * @return edit_area
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "area ".                      		               
	       "FROM edit_area ";
        return($this->selectDB($query, "Edit_area"));
    }
}

?>