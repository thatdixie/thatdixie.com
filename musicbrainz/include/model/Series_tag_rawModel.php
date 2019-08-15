<?php
require_once "MusicbrainzDB.php";
require      "Series_tag_raw.php";

/********************************************************************
 * Series_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Series_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Series_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Series_tag_raw VIEW
     *
     * @return series_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "series,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM series_tag_raw ";
        return($this->selectDB($query, "Series_tag_raw"));
    }
}

?>