<?php
require_once "MusicbrainzDB.php";
require      "Label_meta.php";

/********************************************************************
 * Label_metaModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Label_meta class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_metaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Label_meta VIEW
     *
     * @return label_meta
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "id,".
                      "rating,".
                      "rating_count ".                      		               
	       "FROM label_meta ";
        return($this->selectDB($query, "Label_meta"));
    }
}

?>