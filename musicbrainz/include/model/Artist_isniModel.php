<?php
require_once "MusicbrainzDB.php";
require      "Artist_isni.php";

/********************************************************************
 * Artist_isniModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Artist_isni class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_isniModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Artist_isni VIEW
     *
     * @return artist_isni
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "artist,".
                      "isni,".
                      "edits_pending,".
                      "created ".                      		               
	       "FROM artist_isni ";
        return($this->selectDB($query, "Artist_isni"));
    }
}

?>