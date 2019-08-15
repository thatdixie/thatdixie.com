<?php
require_once "MusicbrainzDB.php";
require      "Area_annotation.php";

/********************************************************************
 * Area_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Area_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Area_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Area_annotation VIEW
     *
     * @return area_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "area,".
                      "annotation ".                      		               
	       "FROM area_annotation ";
        return($this->selectDB($query, "Area_annotation"));
    }
}

?>