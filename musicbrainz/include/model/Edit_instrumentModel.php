<?php
require_once "MusicbrainzDB.php";
require      "Edit_instrument.php";

/********************************************************************
 * Edit_instrumentModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_instrument class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_instrumentModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_instrument VIEW
     *
     * @return edit_instrument
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "instrument ".                      		               
	       "FROM edit_instrument ";
        return($this->selectDB($query, "Edit_instrument"));
    }
}

?>