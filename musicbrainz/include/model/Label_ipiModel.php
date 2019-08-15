<?php
require_once "MusicbrainzDB.php";
require      "Label_ipi.php";

/********************************************************************
 * Label_ipiModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Label_ipi class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_ipiModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Label_ipi VIEW
     *
     * @return label_ipi
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "label,".
                      "ipi,".
                      "edits_pending,".
                      "created ".                      		               
	       "FROM label_ipi ";
        return($this->selectDB($query, "Label_ipi"));
    }
}

?>