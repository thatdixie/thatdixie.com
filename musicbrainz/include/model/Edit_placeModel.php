<?php
require_once "MusicbrainzDB.php";
require      "Edit_place.php";

/********************************************************************
 * Edit_placeModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_place class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_placeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_place VIEW
     *
     * @return edit_place
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "place ".                      		               
	       "FROM edit_place ";
        return($this->selectDB($query, "Edit_place"));
    }
}

?>