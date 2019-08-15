<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_series.php";

/********************************************************************
 * Editor_collection_seriesModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_series class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_series VIEW
     *
     * @return editor_collection_series
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "series ".                      		               
	       "FROM editor_collection_series ";
        return($this->selectDB($query, "Editor_collection_series"));
    }
}

?>