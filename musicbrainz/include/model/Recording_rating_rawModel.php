<?php
require_once "MusicbrainzDB.php";
require      "Recording_rating_raw.php";

/********************************************************************
 * Recording_rating_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Recording_rating_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Recording_rating_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Recording_rating_raw VIEW
     *
     * @return recording_rating_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "recording,".
                      "editor,".
                      "rating ".                      		               
	       "FROM recording_rating_raw ";
        return($this->selectDB($query, "Recording_rating_raw"));
    }
}

?>