<?php
require_once "MusicbrainzDB.php";
require      "Instrument_annotation.php";

/********************************************************************
 * Instrument_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Instrument_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Instrument_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Instrument_annotation VIEW
     *
     * @return instrument_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "instrument,".
                      "annotation ".                      		               
	       "FROM instrument_annotation ";
        return($this->selectDB($query, "Instrument_annotation"));
    }
}

?>