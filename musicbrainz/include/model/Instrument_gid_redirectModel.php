<?php
require_once "MusicbrainzDB.php";
require      "Instrument_gid_redirect.php";

/********************************************************************
 * Instrument_gid_redirectModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Instrument_gid_redirect class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Instrument_gid_redirectModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Instrument_gid_redirect VIEW
     *
     * @return instrument_gid_redirect
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "gid,".
                      "new_id,".
                      "created ".                      		               
	       "FROM instrument_gid_redirect ";
        return($this->selectDB($query, "Instrument_gid_redirect"));
    }
}

?>