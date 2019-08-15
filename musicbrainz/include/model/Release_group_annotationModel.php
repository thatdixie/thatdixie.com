<?php
require_once "MusicbrainzDB.php";
require      "Release_group_annotation.php";

/********************************************************************
 * Release_group_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_group_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_group_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_group_annotation VIEW
     *
     * @return release_group_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "release_group,".
                      "annotation ".                      		               
	       "FROM release_group_annotation ";
        return($this->selectDB($query, "Release_group_annotation"));
    }
}

?>