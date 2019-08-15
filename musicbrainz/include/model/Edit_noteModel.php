<?php
require_once "MusicbrainzDB.php";
require      "Edit_note.php";

/********************************************************************
 * Edit_noteModel inherits MusicbrainzDB and provides functions to
 * map Edit_note class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Edit_noteModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Edit_note by id
     *
     * @return edit_note
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "editor,".
                      "edit,".
                      "text,".
                      "post_time ".                      		               
	       "FROM edit_note ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Edit_note"));
    }

    /*********************************************************
     * Insert a new Edit_note into musicbrainz database
     *
     * @param $edit_note
     * @return n/a
     *********************************************************
     */
    public function insert($edit_note)
    {
        $query="INSERT INTO edit_note ( ".
	              "id,".
                      "editor,".
                      "edit,".
                      "text,".
                      "post_time ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$edit_note->editor." ,".
                      " ".$edit_note->edit." ,".
                      "'".$this->sqlSafe($edit_note->text)."',".
                      "'".$this->sqlSafe($edit_note->post_time)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Edit_note into musicbrainz database
     * and return a Edit_note with new autoincrement
     * primary key
     *
     * @param  $edit_note
     * @return $edit_note
     *********************************************************
     */
    public function insert2($edit_note)
    {
        $query="INSERT INTO edit_note ( ".
	              "id,".
                      "editor,".
                      "edit,".
                      "text,".
                      "post_time ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$edit_note->editor." ,".
                      " ".$edit_note->edit." ,".
                      "'".$this->sqlSafe($edit_note->text)."',".
                      "'".$this->sqlSafe($edit_note->post_time)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $edit_note->id = $id;
	    return($edit_note);	
    }


    /*********************************************************
     * Update a Edit_note in musicbrainz database
     *
     * @param $edit_note
     * @return n/a
     *********************************************************
     */
    public function update($edit_note)
    {
        $query="UPDATE  edit_note ".
	          "SET ".
                      "id= ".$edit_note->id." ,".
                      "editor= ".$edit_note->editor." ,".
                      "edit= ".$edit_note->edit." ,".
                      "text='".$this->sqlSafe($edit_note->text)."',".
                      "post_time='".$this->sqlSafe($edit_note->post_time)."' ".                      
	          "WHERE id=".$edit_note->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Edit_note by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM edit_note WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>