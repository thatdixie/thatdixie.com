<?php
require_once "MusicbrainzDB.php";
require      "Label_annotation.php";

/********************************************************************
 * Label_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Label_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Label_annotation VIEW
     *
     * @return label_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "label,".
                      "annotation ".                      		               
	       "FROM label_annotation ";
        return($this->selectDB($query, "Label_annotation"));
    }
}

?>