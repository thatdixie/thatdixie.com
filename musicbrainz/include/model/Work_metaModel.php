<?php
require_once "MusicbrainzDB.php";
require      "Work_meta.php";

/********************************************************************
 * Work_metaModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Work_meta class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_metaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Work_meta VIEW
     *
     * @return work_meta
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "id,".
                      "rating,".
                      "rating_count ".                      		               
	       "FROM work_meta ";
        return($this->selectDB($query, "Work_meta"));
    }
}

?>