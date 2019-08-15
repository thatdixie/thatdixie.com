<?php
require_once "MusicbrainzDB.php";
require      "Work_type.php";

/********************************************************************
 * Work_typeModel inherits MusicbrainzDB and provides functions to
 * map Work_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Work_type by id
     *
     * @return work_type
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
	       "FROM work_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Work_type"));
    }

    /*********************************************************
     * Insert a new Work_type into musicbrainz database
     *
     * @param $work_type
     * @return n/a
     *********************************************************
     */
    public function insert($work_type)
    {
        $query="INSERT INTO work_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($work_type->name)."',".
                      " ".$work_type->parent." ,".
                      " ".$work_type->child_order." ,".
                      "'".$this->sqlSafe($work_type->description)."',".
                      "'".$this->sqlSafe($work_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Work_type into musicbrainz database
     * and return a Work_type with new autoincrement
     * primary key
     *
     * @param  $work_type
     * @return $work_type
     *********************************************************
     */
    public function insert2($work_type)
    {
        $query="INSERT INTO work_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($work_type->name)."',".
                      " ".$work_type->parent." ,".
                      " ".$work_type->child_order." ,".
                      "'".$this->sqlSafe($work_type->description)."',".
                      "'".$this->sqlSafe($work_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $work_type->id = $id;
	    return($work_type);	
    }


    /*********************************************************
     * Update a Work_type in musicbrainz database
     *
     * @param $work_type
     * @return n/a
     *********************************************************
     */
    public function update($work_type)
    {
        $query="UPDATE  work_type ".
	          "SET ".
                      "id= ".$work_type->id." ,".
                      "name='".$this->sqlSafe($work_type->name)."',".
                      "parent= ".$work_type->parent." ,".
                      "child_order= ".$work_type->child_order." ,".
                      "description='".$this->sqlSafe($work_type->description)."',".
                      "gid='".$this->sqlSafe($work_type->gid)."' ".                      
	          "WHERE id=".$work_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Work_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM work_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>