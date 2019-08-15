<?php
require_once "MusicbrainzDB.php";
require      "Iso_3166_2.php";

/********************************************************************
 * Iso_3166_2Model inherits MusicbrainzDB and provides the select() 
 * function which maps the Iso_3166_2 class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Iso_3166_2Model extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Iso_3166_2 VIEW
     *
     * @return iso_3166_2
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "area,".
                      "code ".                      		               
	       "FROM iso_3166_2 ";
        return($this->selectDB($query, "Iso_3166_2"));
    }
}

?>