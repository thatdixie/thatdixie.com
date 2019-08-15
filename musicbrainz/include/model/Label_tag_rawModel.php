<?php
require_once "MusicbrainzDB.php";
require      "Label_tag_raw.php";

/********************************************************************
 * Label_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Label_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Label_tag_raw VIEW
     *
     * @return label_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "label,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM label_tag_raw ";
        return($this->selectDB($query, "Label_tag_raw"));
    }
}

?>