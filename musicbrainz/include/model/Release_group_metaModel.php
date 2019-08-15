<?php
require_once "MusicbrainzDB.php";
require      "Release_group_meta.php";

/********************************************************************
 * Release_group_metaModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_group_meta class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_group_metaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_group_meta VIEW
     *
     * @return release_group_meta
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "id,".
                      "release_count,".
                      "first_release_date_year,".
                      "first_release_date_month,".
                      "first_release_date_day,".
                      "rating,".
                      "rating_count ".                      		               
	       "FROM release_group_meta ";
        return($this->selectDB($query, "Release_group_meta"));
    }
}

?>