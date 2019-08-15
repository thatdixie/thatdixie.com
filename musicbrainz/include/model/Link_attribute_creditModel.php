<?php
require_once "MusicbrainzDB.php";
require      "Link_attribute_credit.php";

/********************************************************************
 * Link_attribute_creditModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Link_attribute_credit class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Link_attribute_creditModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Link_attribute_credit VIEW
     *
     * @return link_attribute_credit
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "link,".
                      "attribute_type,".
                      "credited_as ".                      		               
	       "FROM link_attribute_credit ";
        return($this->selectDB($query, "Link_attribute_credit"));
    }
}

?>