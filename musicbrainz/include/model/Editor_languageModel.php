<?php
require_once "MusicbrainzDB.php";
require      "Editor_language.php";

/********************************************************************
 * Editor_languageModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Editor_language class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_languageModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Editor_language VIEW
     *
     * @return editor_language
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "editor,".
                      "language,".
                      "fluency ".                      		               
	       "FROM editor_language ";
        return($this->selectDB($query, "Editor_language"));
    }
}

?>