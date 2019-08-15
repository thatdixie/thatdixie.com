<?php
require_once "MusicbrainzDB.php";
require      "Release_group_rating_raw.php";

/********************************************************************
 * Release_group_rating_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_group_rating_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_group_rating_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_group_rating_raw VIEW
     *
     * @return release_group_rating_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "release_group,".
                      "editor,".
                      "rating ".                      		               
	       "FROM release_group_rating_raw ";
        return($this->selectDB($query, "Release_group_rating_raw"));
    }
}

?>