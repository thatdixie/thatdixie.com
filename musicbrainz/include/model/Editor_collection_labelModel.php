<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_label.php";

/********************************************************************
 * Editor_collection_labelModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_collection_label class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_labelModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_collection_label VIEW
     *
     * @return editor_collection_label
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "collection,".
                      "label ".                      		               
	       "FROM editor_collection_label ";
        return($this->selectDB($query, "Editor_collection_label"));
    }
}

?>