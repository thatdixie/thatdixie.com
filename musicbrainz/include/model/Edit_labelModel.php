<?php
require_once "MusicbrainzDB.php";
require      "Edit_label.php";

/********************************************************************
 * Edit_labelModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_label class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_labelModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_label VIEW
     *
     * @return edit_label
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "label,".
                      "status ".                      		               
	       "FROM edit_label ";
        return($this->selectDB($query, "Edit_label"));
    }
}

?>