<?php
require_once "MusicbrainzDB.php";
require      "Edit_url.php";

/********************************************************************
 * Edit_urlModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_url class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_url VIEW
     *
     * @return edit_url
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "url ".                      		               
	       "FROM edit_url ";
        return($this->selectDB($query, "Edit_url"));
    }
}

?>