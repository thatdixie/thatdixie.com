<?php
require_once "MusicbrainzDB.php";
require      "Recording_tag_raw.php";

/********************************************************************
 * Recording_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Recording_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Recording_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Recording_tag_raw VIEW
     *
     * @return recording_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "recording,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM recording_tag_raw ";
        return($this->selectDB($query, "Recording_tag_raw"));
    }
}

?>