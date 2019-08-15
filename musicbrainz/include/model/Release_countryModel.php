<?php
require_once "MusicbrainzDB.php";
require      "Release_country.php";

/********************************************************************
 * Release_countryModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_country class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_countryModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_country VIEW
     *
     * @return release_country
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "release,".
                      "country,".
                      "date_year,".
                      "date_month,".
                      "date_day ".                      		               
	       "FROM release_country ";
        return($this->selectDB($query, "Release_country"));
    }
}

?>