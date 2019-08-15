<?php
require_once "MusicbrainzDB.php";
require      "Link_attribute_text_value.php";

/********************************************************************
 * Link_attribute_text_valueModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Link_attribute_text_value class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Link_attribute_text_valueModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Link_attribute_text_value VIEW
     *
     * @return link_attribute_text_value
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "link,".
                      "attribute_type,".
                      "text_value ".                      		               
	       "FROM link_attribute_text_value ";
        return($this->selectDB($query, "Link_attribute_text_value"));
    }
}

?>