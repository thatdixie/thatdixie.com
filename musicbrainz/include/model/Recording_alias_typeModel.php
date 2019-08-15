<?php
require_once "MusicbrainzDB.php";
require      "Recording_alias_type.php";

/********************************************************************
 * Recording_alias_typeModel inherits MusicbrainzDB and provides functions to
 * map Recording_alias_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Recording_alias_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Recording_alias_type by id
     *
     * @return recording_alias_type
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      		               
	       "FROM recording_alias_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Recording_alias_type"));
    }

    /*********************************************************
     * Insert a new Recording_alias_type into musicbrainz database
     *
     * @param $recording_alias_type
     * @return n/a
     *********************************************************
     */
    public function insert($recording_alias_type)
    {
        $query="INSERT INTO recording_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($recording_alias_type->name)."',".
                      " ".$recording_alias_type->parent." ,".
                      " ".$recording_alias_type->child_order." ,".
                      "'".$this->sqlSafe($recording_alias_type->description)."',".
                      "'".$this->sqlSafe($recording_alias_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Recording_alias_type into musicbrainz database
     * and return a Recording_alias_type with new autoincrement
     * primary key
     *
     * @param  $recording_alias_type
     * @return $recording_alias_type
     *********************************************************
     */
    public function insert2($recording_alias_type)
    {
        $query="INSERT INTO recording_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($recording_alias_type->name)."',".
                      " ".$recording_alias_type->parent." ,".
                      " ".$recording_alias_type->child_order." ,".
                      "'".$this->sqlSafe($recording_alias_type->description)."',".
                      "'".$this->sqlSafe($recording_alias_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $recording_alias_type->id = $id;
	    return($recording_alias_type);	
    }


    /*********************************************************
     * Update a Recording_alias_type in musicbrainz database
     *
     * @param $recording_alias_type
     * @return n/a
     *********************************************************
     */
    public function update($recording_alias_type)
    {
        $query="UPDATE  recording_alias_type ".
	          "SET ".
                      "id= ".$recording_alias_type->id." ,".
                      "name='".$this->sqlSafe($recording_alias_type->name)."',".
                      "parent= ".$recording_alias_type->parent." ,".
                      "child_order= ".$recording_alias_type->child_order." ,".
                      "description='".$this->sqlSafe($recording_alias_type->description)."',".
                      "gid='".$this->sqlSafe($recording_alias_type->gid)."' ".                      
	          "WHERE id=".$recording_alias_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Recording_alias_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM recording_alias_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>