<?php
require_once "MusicbrainzDB.php";
require      "Work_tag_raw.php";

/********************************************************************
 * Work_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Work_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Work_tag_raw VIEW
     *
     * @return work_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "work,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM work_tag_raw ";
        return($this->selectDB($query, "Work_tag_raw"));
    }
}

?>