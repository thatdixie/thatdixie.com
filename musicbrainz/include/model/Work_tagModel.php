<?php
require_once "MusicbrainzDB.php";
require      "Work_tag.php";

/********************************************************************
 * Work_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Work_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Work_tag VIEW
     *
     * @return work_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "work,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM work_tag ";
        return($this->selectDB($query, "Work_tag"));
    }
}

?>