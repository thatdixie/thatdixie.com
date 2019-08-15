<?php
require_once "MusicbrainzDB.php";
require      "Editor_collection_type.php";

/********************************************************************
 * Editor_collection_typeModel inherits MusicbrainzDB and provides functions to
 * map Editor_collection_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Editor_collection_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Editor_collection_type by id
     *
     * @return editor_collection_type
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "name,".
                      "entity_type,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      		               
	       "FROM editor_collection_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Editor_collection_type"));
    }

    /*********************************************************
     * Insert a new Editor_collection_type into musicbrainz database
     *
     * @param $editor_collection_type
     * @return n/a
     *********************************************************
     */
    public function insert($editor_collection_type)
    {
        $query="INSERT INTO editor_collection_type ( ".
	              "id,".
                      "name,".
                      "entity_type,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($editor_collection_type->name)."',".
                      "'".$this->sqlSafe($editor_collection_type->entity_type)."',".
                      " ".$editor_collection_type->parent." ,".
                      " ".$editor_collection_type->child_order." ,".
                      "'".$this->sqlSafe($editor_collection_type->description)."',".
                      "'".$this->sqlSafe($editor_collection_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Editor_collection_type into musicbrainz database
     * and return a Editor_collection_type with new autoincrement
     * primary key
     *
     * @param  $editor_collection_type
     * @return $editor_collection_type
     *********************************************************
     */
    public function insert2($editor_collection_type)
    {
        $query="INSERT INTO editor_collection_type ( ".
	              "id,".
                      "name,".
                      "entity_type,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($editor_collection_type->name)."',".
                      "'".$this->sqlSafe($editor_collection_type->entity_type)."',".
                      " ".$editor_collection_type->parent." ,".
                      " ".$editor_collection_type->child_order." ,".
                      "'".$this->sqlSafe($editor_collection_type->description)."',".
                      "'".$this->sqlSafe($editor_collection_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $editor_collection_type->id = $id;
	    return($editor_collection_type);	
    }


    /*********************************************************
     * Update a Editor_collection_type in musicbrainz database
     *
     * @param $editor_collection_type
     * @return n/a
     *********************************************************
     */
    public function update($editor_collection_type)
    {
        $query="UPDATE  editor_collection_type ".
	          "SET ".
                      "id= ".$editor_collection_type->id." ,".
                      "name='".$this->sqlSafe($editor_collection_type->name)."',".
                      "entity_type='".$this->sqlSafe($editor_collection_type->entity_type)."',".
                      "parent= ".$editor_collection_type->parent." ,".
                      "child_order= ".$editor_collection_type->child_order." ,".
                      "description='".$this->sqlSafe($editor_collection_type->description)."',".
                      "gid='".$this->sqlSafe($editor_collection_type->gid)."' ".                      
	          "WHERE id=".$editor_collection_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Editor_collection_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM editor_collection_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>