<?php
require_once "MusicbrainzDB.php";
require      "Recording_annotation.php";

/********************************************************************
 * Recording_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Recording_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Recording_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Recording_annotation VIEW
     *
     * @return recording_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "recording,".
                      "annotation ".                      		               
	       "FROM recording_annotation ";
        return($this->selectDB($query, "Recording_annotation"));
    }
}

?>