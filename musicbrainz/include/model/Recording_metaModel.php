<?php
require_once "MusicbrainzDB.php";
require      "Recording_meta.php";

/********************************************************************
 * Recording_metaModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Recording_meta class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Recording_metaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Recording_meta VIEW
     *
     * @return recording_meta
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "id,".
                      "rating,".
                      "rating_count ".                      		               
	       "FROM recording_meta ";
        return($this->selectDB($query, "Recording_meta"));
    }
}

?>