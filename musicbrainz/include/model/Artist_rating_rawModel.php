<?php
require_once "MusicbrainzDB.php";
require      "Artist_rating_raw.php";

/********************************************************************
 * Artist_rating_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Artist_rating_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_rating_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Artist_rating_raw VIEW
     *
     * @return artist_rating_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "artist,".
                      "editor,".
                      "rating ".                      		               
	       "FROM artist_rating_raw ";
        return($this->selectDB($query, "Artist_rating_raw"));
    }
}

?>