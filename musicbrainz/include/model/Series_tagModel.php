<?php
require_once "MusicbrainzDB.php";
require      "Series_tag.php";

/********************************************************************
 * Series_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Series_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Series_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Series_tag VIEW
     *
     * @return series_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "series,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM series_tag ";
        return($this->selectDB($query, "Series_tag"));
    }
}

?>