<?php
require_once "MusicbrainzDB.php";
require      "Release_group_tag_raw.php";

/********************************************************************
 * Release_group_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_group_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_group_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_group_tag_raw VIEW
     *
     * @return release_group_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "release_group,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM release_group_tag_raw ";
        return($this->selectDB($query, "Release_group_tag_raw"));
    }
}

?>