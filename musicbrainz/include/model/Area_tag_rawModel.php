<?php
require_once "MusicbrainzDB.php";
require      "Area_tag_raw.php";

/********************************************************************
 * Area_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Area_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Area_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Area_tag_raw VIEW
     *
     * @return area_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "area,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM area_tag_raw ";
        return($this->selectDB($query, "Area_tag_raw"));
    }
}

?>