<?php
require_once "MusicbrainzDB.php";
require      "Release_annotation.php";

/********************************************************************
 * Release_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_annotation VIEW
     *
     * @return release_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "release,".
                      "annotation ".                      		               
	       "FROM release_annotation ";
        return($this->selectDB($query, "Release_annotation"));
    }
}

?>