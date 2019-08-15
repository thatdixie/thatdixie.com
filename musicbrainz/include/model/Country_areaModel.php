<?php
require_once "MusicbrainzDB.php";
require      "Country_area.php";

/********************************************************************
 * Country_areaModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Country_area class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Country_areaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Country_area VIEW
     *
     * @return country_area
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "area ".                      		               
	       "FROM country_area ";
        return($this->selectDB($query, "Country_area"));
    }
}

?>