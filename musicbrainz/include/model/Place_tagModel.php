<?php
require_once "MusicbrainzDB.php";
require      "Place_tag.php";

/********************************************************************
 * Place_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Place_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Place_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Place_tag VIEW
     *
     * @return place_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "place,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM place_tag ";
        return($this->selectDB($query, "Place_tag"));
    }
}

?>