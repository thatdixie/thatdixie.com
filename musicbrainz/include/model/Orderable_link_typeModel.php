<?php
require_once "MusicbrainzDB.php";
require      "Orderable_link_type.php";

/********************************************************************
 * Orderable_link_typeModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Orderable_link_type class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Orderable_link_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Orderable_link_type VIEW
     *
     * @return orderable_link_type
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "link_type,".
                      "direction ".                      		               
	       "FROM orderable_link_type ";
        return($this->selectDB($query, "Orderable_link_type"));
    }
}

?>