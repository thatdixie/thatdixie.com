<?php
require_once "MusicbrainzDB.php";
require      "Alternative_medium_track.php";

/********************************************************************
 * Alternative_medium_trackModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Alternative_medium_track class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Alternative_medium_trackModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Alternative_medium_track VIEW
     *
     * @return alternative_medium_track
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "alternative_medium,".
                      "track,".
                      "alternative_track ".                      		               
	       "FROM alternative_medium_track ";
        return($this->selectDB($query, "Alternative_medium_track"));
    }
}

?>