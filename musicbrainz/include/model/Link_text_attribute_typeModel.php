<?php
require_once "MusicbrainzDB.php";
require      "Link_text_attribute_type.php";

/********************************************************************
 * Link_text_attribute_typeModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Link_text_attribute_type class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Link_text_attribute_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Link_text_attribute_type VIEW
     *
     * @return link_text_attribute_type
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "attribute_type ".                      		               
	       "FROM link_text_attribute_type ";
        return($this->selectDB($query, "Link_text_attribute_type"));
    }
}

?>