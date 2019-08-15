<?php
require_once "MusicbrainzDB.php";
require      "Release_coverart.php";

/********************************************************************
 * Release_coverartModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_coverart class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_coverartModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_coverart VIEW
     *
     * @return release_coverart
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "id,".
                      "last_updated,".
                      "cover_art_url ".                      		               
	       "FROM release_coverart ";
        return($this->selectDB($query, "Release_coverart"));
    }
}

?>