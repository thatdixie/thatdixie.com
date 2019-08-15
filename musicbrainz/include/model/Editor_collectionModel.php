<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection.php";

/********************************************************************
 * Editor_collectionModel inherits MusicbrainzDB and provides functions to
 * map Editor_collection class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collectionModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Editor_collection by id
     *
     * @return editor_collection
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "editor,".
                      "name,".
                      "public,".
                      "description,".
                      "type ".                      		               
	       "FROM editor_collection ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Editor_collection"));
    }

    /*********************************************************
     * Insert a new Editor_collection into musicbrainz database
     *
     * @param $editor_collection
     * @return n/a
     *********************************************************
     */
    public function insert($editor_collection)
    {
        $query="INSERT INTO editor_collection ( ".
	              "id,".
                      "gid,".
                      "editor,".
                      "name,".
                      "public,".
                      "description,".
                      "type ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($editor_collection->gid)."',".
                      " ".$editor_collection->editor." ,".
                      "'".$this->sqlSafe($editor_collection->name)."',".
                      "'".$this->sqlSafe($editor_collection->public)."',".
                      "'".$this->sqlSafe($editor_collection->description)."',".
                      " ".$editor_collection->type."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Editor_collection into musicbrainz database
     * and return a Editor_collection with new autoincrement
     * primary key
     *
     * @param  $editor_collection
     * @return $editor_collection
     *********************************************************
     */
    public function insert2($editor_collection)
    {
        $query="INSERT INTO editor_collection ( ".
	              "id,".
                      "gid,".
                      "editor,".
                      "name,".
                      "public,".
                      "description,".
                      "type ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($editor_collection->gid)."',".
                      " ".$editor_collection->editor." ,".
                      "'".$this->sqlSafe($editor_collection->name)."',".
                      "'".$this->sqlSafe($editor_collection->public)."',".
                      "'".$this->sqlSafe($editor_collection->description)."',".
                      " ".$editor_collection->type."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $editor_collection->id = $id;
	    return($editor_collection);	
    }


    /*********************************************************
     * Update a Editor_collection in musicbrainz database
     *
     * @param $editor_collection
     * @return n/a
     *********************************************************
     */
    public function update($editor_collection)
    {
        $query="UPDATE  editor_collection ".
	          "SET ".
                      "id= ".$editor_collection->id." ,".
                      "gid='".$this->sqlSafe($editor_collection->gid)."',".
                      "editor= ".$editor_collection->editor." ,".
                      "name='".$this->sqlSafe($editor_collection->name)."',".
                      "public='".$this->sqlSafe($editor_collection->public)."',".
                      "description='".$this->sqlSafe($editor_collection->description)."',".
                      "type= ".$editor_collection->type."  ".                      
	          "WHERE id=".$editor_collection->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Editor_collection by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM editor_collection WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>