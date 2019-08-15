<?php
require_once "MusicbrainzDB.php";
require      "Edit_series.php";

/********************************************************************
 * Edit_seriesModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Edit_series class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Edit_series VIEW
     *
     * @return edit_series
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "edit,".
                      "series ".                      		               
	       "FROM edit_series ";
        return($this->selectDB($query, "Edit_series"));
    }
}

?>