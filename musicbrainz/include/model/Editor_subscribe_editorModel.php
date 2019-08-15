<?php
require_once "MusicbrainzDB.php";
require      "Editor_subscribe_editor.php";

/********************************************************************
 * Editor_subscribe_editorModel inherits MusicbrainzDB and provides functions to
 * map Editor_subscribe_editor class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_subscribe_editorModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Editor_subscribe_editor by id
     *
     * @return editor_subscribe_editor
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "editor,".
                      "subscribed_editor,".
                      "last_edit_sent ".                      		               
	       "FROM editor_subscribe_editor ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Editor_subscribe_editor"));
    }

    /*********************************************************
     * Insert a new Editor_subscribe_editor into musicbrainz database
     *
     * @param $editor_subscribe_editor
     * @return n/a
     *********************************************************
     */
    public function insert($editor_subscribe_editor)
    {
        $query="INSERT INTO editor_subscribe_editor ( ".
	              "id,".
                      "editor,".
                      "subscribed_editor,".
                      "last_edit_sent ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_subscribe_editor->editor." ,".
                      " ".$editor_subscribe_editor->subscribed_editor." ,".
                      " ".$editor_subscribe_editor->last_edit_sent."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Editor_subscribe_editor into musicbrainz database
     * and return a Editor_subscribe_editor with new autoincrement
     * primary key
     *
     * @param  $editor_subscribe_editor
     * @return $editor_subscribe_editor
     *********************************************************
     */
    public function insert2($editor_subscribe_editor)
    {
        $query="INSERT INTO editor_subscribe_editor ( ".
	              "id,".
                      "editor,".
                      "subscribed_editor,".
                      "last_edit_sent ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_subscribe_editor->editor." ,".
                      " ".$editor_subscribe_editor->subscribed_editor." ,".
                      " ".$editor_subscribe_editor->last_edit_sent."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $editor_subscribe_editor->id = $id;
	    return($editor_subscribe_editor);	
    }


    /*********************************************************
     * Update a Editor_subscribe_editor in musicbrainz database
     *
     * @param $editor_subscribe_editor
     * @return n/a
     *********************************************************
     */
    public function update($editor_subscribe_editor)
    {
        $query="UPDATE  editor_subscribe_editor ".
	          "SET ".
                      "id= ".$editor_subscribe_editor->id." ,".
                      "editor= ".$editor_subscribe_editor->editor." ,".
                      "subscribed_editor= ".$editor_subscribe_editor->subscribed_editor." ,".
                      "last_edit_sent= ".$editor_subscribe_editor->last_edit_sent."  ".                      
	          "WHERE id=".$editor_subscribe_editor->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Editor_subscribe_editor by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM editor_subscribe_editor WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>