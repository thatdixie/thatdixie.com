<?php
require_once "MusicbrainzDB.php";
require      "Recording_tag.php";

/********************************************************************
 * Recording_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Recording_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Recording_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Recording_tag VIEW
     *
     * @return recording_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "recording,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM recording_tag ";
        return($this->selectDB($query, "Recording_tag"));
    }
}

?>