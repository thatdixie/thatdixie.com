<?php
require_once "MusicbrainzDB.php";
require      "Link_type_attribute_type.php";

/********************************************************************
 * Link_type_attribute_typeModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Link_type_attribute_type class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Link_type_attribute_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Link_type_attribute_type VIEW
     *
     * @return link_type_attribute_type
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "link_type,".
                      "attribute_type,".
                      "min,".
                      "max,".
                      "last_updated ".                      		               
	       "FROM link_type_attribute_type ";
        return($this->selectDB($query, "Link_type_attribute_type"));
    }
}

?>