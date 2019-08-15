<?php
require_once "MusicbrainzDB.php";
require      "Release_group_tag.php";

/********************************************************************
 * Release_group_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_group_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_group_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_group_tag VIEW
     *
     * @return release_group_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "release_group,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM release_group_tag ";
        return($this->selectDB($query, "Release_group_tag"));
    }
}

?>