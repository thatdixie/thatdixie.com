<?php
require_once "MusicbrainzDB.php";
require      "Artist_annotation.php";

/********************************************************************
 * Artist_annotationModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Artist_annotation class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_annotationModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Artist_annotation VIEW
     *
     * @return artist_annotation
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "artist,".
                      "annotation ".                      		               
	       "FROM artist_annotation ";
        return($this->selectDB($query, "Artist_annotation"));
    }
}

?>