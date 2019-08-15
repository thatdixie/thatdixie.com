<?php
require_once "MusicbrainzDB.php";
require      "Release_tag.php";

/********************************************************************
 * Release_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_tag VIEW
     *
     * @return release_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "release,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM release_tag ";
        return($this->selectDB($query, "Release_tag"));
    }
}

?>