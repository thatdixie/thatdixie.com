<?php
require_once "MusicbrainzDB.php";
require      "Instrument_tag_raw.php";

/********************************************************************
 * Instrument_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Instrument_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Instrument_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Instrument_tag_raw VIEW
     *
     * @return instrument_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "instrument,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM instrument_tag_raw ";
        return($this->selectDB($query, "Instrument_tag_raw"));
    }
}

?>