<?php
require_once "MusicbrainzDB.php";
require      "Release_unknown_country.php";

/********************************************************************
 * Release_unknown_countryModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_unknown_country class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_unknown_countryModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_unknown_country VIEW
     *
     * @return release_unknown_country
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "release,".
                      "date_year,".
                      "date_month,".
                      "date_day ".                      		               
	       "FROM release_unknown_country ";
        return($this->selectDB($query, "Release_unknown_country"));
    }
}

?>