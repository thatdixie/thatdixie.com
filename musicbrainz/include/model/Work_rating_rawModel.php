<?php
require_once "MusicbrainzDB.php";
require      "Work_rating_raw.php";

/********************************************************************
 * Work_rating_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Work_rating_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_rating_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Work_rating_raw VIEW
     *
     * @return work_rating_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "work,".
                      "editor,".
                      "rating ".                      		               
	       "FROM work_rating_raw ";
        return($this->selectDB($query, "Work_rating_raw"));
    }
}

?>