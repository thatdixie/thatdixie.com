<?php
require_once "MusicbrainzDB.php";
require      "Place_tag_raw.php";

/********************************************************************
 * Place_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Place_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Place_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Place_tag_raw VIEW
     *
     * @return place_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "place,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM place_tag_raw ";
        return($this->selectDB($query, "Place_tag_raw"));
    }
}

?>