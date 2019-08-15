<?php
require_once "MusicbrainzDB.php";
require      "Artist_tag_raw.php";

/********************************************************************
 * Artist_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Artist_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Artist_tag_raw VIEW
     *
     * @return artist_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "artist,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM artist_tag_raw ";
        return($this->selectDB($query, "Artist_tag_raw"));
    }
}

?>