<?php
require_once "MusicbrainzDB.php";
require      "Label_rating_raw.php";

/********************************************************************
 * Label_rating_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Label_rating_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_rating_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Label_rating_raw VIEW
     *
     * @return label_rating_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "label,".
                      "editor,".
                      "rating ".                      		               
	       "FROM label_rating_raw ";
        return($this->selectDB($query, "Label_rating_raw"));
    }
}

?>