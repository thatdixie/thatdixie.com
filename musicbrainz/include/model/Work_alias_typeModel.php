<?php
require_once "MusicbrainzDB.php";
require      "Work_alias_type.php";

/********************************************************************
 * Work_alias_typeModel inherits MusicbrainzDB and provides functions to
 * map Work_alias_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_alias_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Work_alias_type by id
     *
     * @return work_alias_type
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
	       "FROM work_alias_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Work_alias_type"));
    }

    /*********************************************************
     * Insert a new Work_alias_type into musicbrainz database
     *
     * @param $work_alias_type
     * @return n/a
     *********************************************************
     */
    public function insert($work_alias_type)
    {
        $query="INSERT INTO work_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($work_alias_type->name)."',".
                      " ".$work_alias_type->parent." ,".
                      " ".$work_alias_type->child_order." ,".
                      "'".$this->sqlSafe($work_alias_type->description)."',".
                      "'".$this->sqlSafe($work_alias_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Work_alias_type into musicbrainz database
     * and return a Work_alias_type with new autoincrement
     * primary key
     *
     * @param  $work_alias_type
     * @return $work_alias_type
     *********************************************************
     */
    public function insert2($work_alias_type)
    {
        $query="INSERT INTO work_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($work_alias_type->name)."',".
                      " ".$work_alias_type->parent." ,".
                      " ".$work_alias_type->child_order." ,".
                      "'".$this->sqlSafe($work_alias_type->description)."',".
                      "'".$this->sqlSafe($work_alias_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $work_alias_type->id = $id;
	    return($work_alias_type);	
    }


    /*********************************************************
     * Update a Work_alias_type in musicbrainz database
     *
     * @param $work_alias_type
     * @return n/a
     *********************************************************
     */
    public function update($work_alias_type)
    {
        $query="UPDATE  work_alias_type ".
	          "SET ".
                      "id= ".$work_alias_type->id." ,".
                      "name='".$this->sqlSafe($work_alias_type->name)."',".
                      "parent= ".$work_alias_type->parent." ,".
                      "child_order= ".$work_alias_type->child_order." ,".
                      "description='".$this->sqlSafe($work_alias_type->description)."',".
                      "gid='".$this->sqlSafe($work_alias_type->gid)."' ".                      
	          "WHERE id=".$work_alias_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Work_alias_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM work_alias_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>