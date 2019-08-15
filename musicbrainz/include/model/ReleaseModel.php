<?php
require_once "MusicbrainzDB.php";
require      "Release.php";

/********************************************************************
 * ReleaseModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class ReleaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release VIEW
     *
     * @return release
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "recording,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM release ";
        return($this->selectDB($query, "Release"));
    }
}

?>