<?php
require_once "MusicbrainzDB.php";
require      "Place_annotation.php";

/********************************************************************
 * Place_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Place_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Place_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Place_annotation VIEW
     *
     * @return place_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "place,".
                      "annotation ".                      		               
	       "FROM place_annotation ";
        return($this->selectDB($query, "Place_annotation"));
    }
}

?>