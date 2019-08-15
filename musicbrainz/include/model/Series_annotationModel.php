<?php
require_once "MusicbrainzDB.php";
require      "Series_annotation.php";

/********************************************************************
 * Series_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Series_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Series_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Series_annotation VIEW
     *
     * @return series_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "series,".
                      "annotation ".                      		               
	       "FROM series_annotation ";
        return($this->selectDB($query, "Series_annotation"));
    }
}

?>