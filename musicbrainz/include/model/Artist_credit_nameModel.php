<?php
require_once "MusicbrainzDB.php";
require      "Artist_credit_name.php";

/********************************************************************
 * Artist_credit_nameModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Artist_credit_name class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_credit_nameModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Artist_credit_name VIEW
     *
     * @return artist_credit_name
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "artist_credit,".
                      "position,".
                      "artist,".
                      "name,".
                      "join_phrase ".                      		               
	       "FROM artist_credit_name ";
        return($this->selectDB($query, "Artist_credit_name"));
    }
}

?>