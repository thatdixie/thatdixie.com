<?php
require_once "MusicbrainzDB.php";
require      "Editor_preference.php";

/********************************************************************
 * Editor_preferenceModel inherits MusicbrainzDB and provides functions to
 * map Editor_preference class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_preferenceModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Editor_preference by id
     *
     * @return editor_preference
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "editor,".
                      "name,".
                      "value ".                      		               
	       "FROM editor_preference ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Editor_preference"));
    }

    /*********************************************************
     * Insert a new Editor_preference into musicbrainz database
     *
     * @param $editor_preference
     * @return n/a
     *********************************************************
     */
    public function insert($editor_preference)
    {
        $query="INSERT INTO editor_preference ( ".
	              "id,".
                      "editor,".
                      "name,".
                      "value ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_preference->editor." ,".
                      "'".$this->sqlSafe($editor_preference->name)."',".
                      "'".$this->sqlSafe($editor_preference->value)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Editor_preference into musicbrainz database
     * and return a Editor_preference with new autoincrement
     * primary key
     *
     * @param  $editor_preference
     * @return $editor_preference
     *********************************************************
     */
    public function insert2($editor_preference)
    {
        $query="INSERT INTO editor_preference ( ".
	              "id,".
                      "editor,".
                      "name,".
                      "value ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$editor_preference->editor." ,".
                      "'".$this->sqlSafe($editor_preference->name)."',".
                      "'".$this->sqlSafe($editor_preference->value)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $editor_preference->id = $id;
	    return($editor_preference);	
    }


    /*********************************************************
     * Update a Editor_preference in musicbrainz database
     *
     * @param $editor_preference
     * @return n/a
     *********************************************************
     */
    public function update($editor_preference)
    {
        $query="UPDATE  editor_preference ".
	          "SET ".
                      "id= ".$editor_preference->id." ,".
                      "editor= ".$editor_preference->editor." ,".
                      "name='".$this->sqlSafe($editor_preference->name)."',".
                      "value='".$this->sqlSafe($editor_preference->value)."' ".                      
	          "WHERE id=".$editor_preference->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Editor_preference by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM editor_preference WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>