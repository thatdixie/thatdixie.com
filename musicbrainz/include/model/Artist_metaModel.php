<?php
require_once "MusicbrainzDB.php";
require      "Artist_meta.php";

/********************************************************************
 * Artist_metaModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Artist_meta class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_metaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Artist_meta VIEW
     *
     * @return artist_meta
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "id,".
                      "rating,".
                      "rating_count ".                      		               
	       "FROM artist_meta ";
        return($this->selectDB($query, "Artist_meta"));
    }
}

?>