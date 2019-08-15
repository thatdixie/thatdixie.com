<?php
require_once "MusicbrainzDB.php";
require      "Editor_subscribe_label.php";

/********************************************************************
 * Editor_subscribe_labelModel inherits MusicbrainzDB and provides functions to
 * map Editor_subscribe_label class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_subscribe_labelModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Editor_subscribe_label by id
     *
     * @return editor_subscribe_label
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "editor,".
                      "label,".
                      "last_edit_sent ".                      		               
	       "FROM editor_subscribe_label ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Editor_subscribe_label"));
    }

    /*********************************************************
     * Insert a new Editor_subscribe_label into musicbrainz database
     *
     * @param $editor_subscribe_label
     * @return n/a
     *********************************************************
     */
    public function insert($editor_subscribe_label)
    {
        $query="INSERT INTO editor_subscribe_label ( ".
	              "id,".
                      "editor,".
                      "label,".
                      "last_edit_sent ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_subscribe_label->editor." ,".
                      " ".$editor_subscribe_label->label." ,".
                      " ".$editor_subscribe_label->last_edit_sent."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Editor_subscribe_label into musicbrainz database
     * and return a Editor_subscribe_label with new autoincrement
     * primary key
     *
     * @param  $editor_subscribe_label
     * @return $editor_subscribe_label
     *********************************************************
     */
    public function insert2($editor_subscribe_label)
    {
        $query="INSERT INTO editor_subscribe_label ( ".
	              "id,".
                      "editor,".
                      "label,".
                      "last_edit_sent ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_subscribe_label->editor." ,".
                      " ".$editor_subscribe_label->label." ,".
                      " ".$editor_subscribe_label->last_edit_sent."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $editor_subscribe_label->id = $id;
	    return($editor_subscribe_label);	
    }


    /*********************************************************
     * Update a Editor_subscribe_label in musicbrainz database
     *
     * @param $editor_subscribe_label
     * @return n/a
     *********************************************************
     */
    public function update($editor_subscribe_label)
    {
        $query="UPDATE  editor_subscribe_label ".
	          "SET ".
                      "id= ".$editor_subscribe_label->id." ,".
                      "editor= ".$editor_subscribe_label->editor." ,".
                      "label= ".$editor_subscribe_label->label." ,".
                      "last_edit_sent= ".$editor_subscribe_label->last_edit_sent."  ".                      
	          "WHERE id=".$editor_subscribe_label->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Editor_subscribe_label by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM editor_subscribe_label WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>