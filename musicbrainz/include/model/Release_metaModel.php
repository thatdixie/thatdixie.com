<?php
require_once "MusicbrainzDB.php";
require      "Release_meta.php";

/********************************************************************
 * Release_metaModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Release_meta class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_metaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Release_meta VIEW
     *
     * @return release_meta
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "id,".
                      "date_added,".
                      "info_url,".
                      "amazon_asin,".
                      "amazon_store,".
                      "cover_art_presence ".                      		               
	       "FROM release_meta ";
        return($this->selectDB($query, "Release_meta"));
    }
}

?>