<?php
require_once "MusicbrainzDB.php";
require      "Instrument_tag.php";

/********************************************************************
 * Instrument_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Instrument_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Instrument_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Instrument_tag VIEW
     *
     * @return instrument_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "instrument,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM instrument_tag ";
        return($this->selectDB($query, "Instrument_tag"));
    }
}

?>