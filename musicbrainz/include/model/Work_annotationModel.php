<?php
require_once "MusicbrainzDB.php";
require      "Work_annotation.php";

/********************************************************************
 * Work_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Work_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Work_annotation VIEW
     *
     * @return work_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "work,".
                      "annotation ".                      		               
	       "FROM work_annotation ";
        return($this->selectDB($query, "Work_annotation"));
    }
}

?>