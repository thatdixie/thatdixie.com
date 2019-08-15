<?php
require_once "MusicbrainzDB.php";
require      "Release_group_secondary_type_join.php";

/********************************************************************
 * Release_group_secondary_type_joinModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_group_secondary_type_join class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_group_secondary_type_joinModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_group_secondary_type_join VIEW
     *
     * @return release_group_secondary_type_join
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "release_group,".
                      "secondary_type,".
                      "created ".                      		               
	       "FROM release_group_secondary_type_join ";
        return($this->selectDB($query, "Release_group_secondary_type_join"));
    }
}

?>