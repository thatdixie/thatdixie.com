<?php
require_once "MusicbrainzDB.php";
require      "Link_attribute.php";

/********************************************************************
 * Link_attributeModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Link_attribute class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Link_attributeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Link_attribute VIEW
     *
     * @return link_attribute
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "link,".
                      "attribute_type,".
                      "created ".                      		               
	       "FROM link_attribute ";
        return($this->selectDB($query, "Link_attribute"));
    }
}

?>