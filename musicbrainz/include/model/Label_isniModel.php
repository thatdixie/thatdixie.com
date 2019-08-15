<?php
require_once "MusicbrainzDB.php";
require      "Label_isni.php";

/********************************************************************
 * Label_isniModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Label_isni class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_isniModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Label_isni VIEW
     *
     * @return label_isni
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "label,".
                      "isni,".
                      "edits_pending,".
                      "created ".                      		               
	       "FROM label_isni ";
        return($this->selectDB($query, "Label_isni"));
    }
}

?>