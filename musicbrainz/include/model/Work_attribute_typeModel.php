<?php
require_once "MusicbrainzDB.php";
require      "Work_attribute_type.php";

/********************************************************************
 * Work_attribute_typeModel inherits MusicbrainzDB and provides functions to
 * map Work_attribute_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_attribute_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Work_attribute_type by id
     *
     * @return work_attribute_type
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "name,".
                      "comment,".
                      "free_text,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      		               
	       "FROM work_attribute_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Work_attribute_type"));
    }

    /*********************************************************
     * Insert a new Work_attribute_type into musicbrainz database
     *
     * @param $work_attribute_type
     * @return n/a
     *********************************************************
     */
    public function insert($work_attribute_type)
    {
        $query="INSERT INTO work_attribute_type ( ".
	              "id,".
                      "name,".
                      "comment,".
                      "free_text,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($work_attribute_type->name)."',".
                      "'".$this->sqlSafe($work_attribute_type->comment)."',".
                      "'".$this->sqlSafe($work_attribute_type->free_text)."',".
                      " ".$work_attribute_type->parent." ,".
                      " ".$work_attribute_type->child_order." ,".
                      "'".$this->sqlSafe($work_attribute_type->description)."',".
                      "'".$this->sqlSafe($work_attribute_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Work_attribute_type into musicbrainz database
     * and return a Work_attribute_type with new autoincrement
     * primary key
     *
     * @param  $work_attribute_type
     * @return $work_attribute_type
     *********************************************************
     */
    public function insert2($work_attribute_type)
    {
        $query="INSERT INTO work_attribute_type ( ".
	              "id,".
                      "name,".
                      "comment,".
                      "free_text,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($work_attribute_type->name)."',".
                      "'".$this->sqlSafe($work_attribute_type->comment)."',".
                      "'".$this->sqlSafe($work_attribute_type->free_text)."',".
                      " ".$work_attribute_type->parent." ,".
                      " ".$work_attribute_type->child_order." ,".
                      "'".$this->sqlSafe($work_attribute_type->description)."',".
                      "'".$this->sqlSafe($work_attribute_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $work_attribute_type->id = $id;
	    return($work_attribute_type);	
    }


    /*********************************************************
     * Update a Work_attribute_type in musicbrainz database
     *
     * @param $work_attribute_type
     * @return n/a
     *********************************************************
     */
    public function update($work_attribute_type)
    {
        $query="UPDATE  work_attribute_type ".
	          "SET ".
                      "id= ".$work_attribute_type->id." ,".
                      "name='".$this->sqlSafe($work_attribute_type->name)."',".
                      "comment='".$this->sqlSafe($work_attribute_type->comment)."',".
                      "free_text='".$this->sqlSafe($work_attribute_type->free_text)."',".
                      "parent= ".$work_attribute_type->parent." ,".
                      "child_order= ".$work_attribute_type->child_order." ,".
                      "description='".$this->sqlSafe($work_attribute_type->description)."',".
                      "gid='".$this->sqlSafe($work_attribute_type->gid)."' ".                      
	          "WHERE id=".$work_attribute_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Work_attribute_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM work_attribute_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>