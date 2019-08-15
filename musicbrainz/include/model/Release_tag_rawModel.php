<?php
require_once "MusicbrainzDB.php";
require      "Release_tag_raw.php";

/********************************************************************
 * Release_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_tag_raw VIEW
     *
     * @return release_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "release,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM release_tag_raw ";
        return($this->selectDB($query, "Release_tag_raw"));
    }
}

?>