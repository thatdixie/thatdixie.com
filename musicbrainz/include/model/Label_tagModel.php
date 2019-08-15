<?php
require_once "MusicbrainzDB.php";
require      "Label_tag.php";

/********************************************************************
 * Label_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Label_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Label_tag VIEW
     *
     * @return label_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "label,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM label_tag ";
        return($this->selectDB($query, "Label_tag"));
    }
}

?>