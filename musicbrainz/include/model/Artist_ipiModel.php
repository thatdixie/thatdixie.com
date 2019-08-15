<?php
require_once "MusicbrainzDB.php";
require      "Artist_ipi.php";

/********************************************************************
 * Artist_ipiModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Artist_ipi class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_ipiModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Artist_ipi VIEW
     *
     * @return artist_ipi
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "artist,".
                      "ipi,".
                      "edits_pending,".
                      "created ".                      		               
	       "FROM artist_ipi ";
        return($this->selectDB($query, "Artist_ipi"));
    }
}

?>