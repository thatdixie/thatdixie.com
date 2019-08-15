<?php
require_once "MusicbrainzDB.php";
require      "Artist_tag.php";

/********************************************************************
 * Artist_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Artist_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Artist_tag VIEW
     *
     * @return artist_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "artist,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM artist_tag ";
        return($this->selectDB($query, "Artist_tag"));
    }
}

?>