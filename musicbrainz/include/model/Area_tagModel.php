<?php
require_once "MusicbrainzDB.php";
require      "Area_tag.php";

/********************************************************************
 * Area_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Area_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Area_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Area_tag VIEW
     *
     * @return area_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "area,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM area_tag ";
        return($this->selectDB($query, "Area_tag"));
    }
}

?>