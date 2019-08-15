<?php
require_once "MusicbrainzDB.php";
require      "Work_attribute_type_allowed_value.php";

/********************************************************************
 * Work_attribute_type_allowed_valueModel inherits MusicbrainzDB and provides functions to
 * map Work_attribute_type_allowed_value class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_attribute_type_allowed_valueModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Work_attribute_type_allowed_value by id
     *
     * @return work_attribute_type_allowed_value
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "work_attribute_type,".
                      "value,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      		               
	       "FROM work_attribute_type_allowed_value ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Work_attribute_type_allowed_value"));
    }

    /*********************************************************
     * Insert a new Work_attribute_type_allowed_value into musicbrainz database
     *
     * @param $work_attribute_type_allowed_value
     * @return n/a
     *********************************************************
     */
    public function insert($work_attribute_type_allowed_value)
    {
        $query="INSERT INTO work_attribute_type_allowed_value ( ".
	              "id,".
                      "work_attribute_type,".
                      "value,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$work_attribute_type_allowed_value->work_attribute_type." ,".
                      "'".$this->sqlSafe($work_attribute_type_allowed_value->value)."',".
                      " ".$work_attribute_type_allowed_value->parent." ,".
                      " ".$work_attribute_type_allowed_value->child_order." ,".
                      "'".$this->sqlSafe($work_attribute_type_allowed_value->description)."',".
                      "'".$this->sqlSafe($work_attribute_type_allowed_value->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Work_attribute_type_allowed_value into musicbrainz database
     * and return a Work_attribute_type_allowed_value with new autoincrement
     * primary key
     *
     * @param  $work_attribute_type_allowed_value
     * @return $work_attribute_type_allowed_value
     *********************************************************
     */
    public function insert2($work_attribute_type_allowed_value)
    {
        $query="INSERT INTO work_attribute_type_allowed_value ( ".
	              "id,".
                      "work_attribute_type,".
                      "value,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$work_attribute_type_allowed_value->work_attribute_type." ,".
                      "'".$this->sqlSafe($work_attribute_type_allowed_value->value)."',".
                      " ".$work_attribute_type_allowed_value->parent." ,".
                      " ".$work_attribute_type_allowed_value->child_order." ,".
                      "'".$this->sqlSafe($work_attribute_type_allowed_value->description)."',".
                      "'".$this->sqlSafe($work_attribute_type_allowed_value->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $work_attribute_type_allowed_value->id = $id;
	    return($work_attribute_type_allowed_value);	
    }


    /*********************************************************
     * Update a Work_attribute_type_allowed_value in musicbrainz database
     *
     * @param $work_attribute_type_allowed_value
     * @return n/a
     *********************************************************
     */
    public function update($work_attribute_type_allowed_value)
    {
        $query="UPDATE  work_attribute_type_allowed_value ".
	          "SET ".
                      "id= ".$work_attribute_type_allowed_value->id." ,".
                      "work_attribute_type= ".$work_attribute_type_allowed_value->work_attribute_type." ,".
                      "value='".$this->sqlSafe($work_attribute_type_allowed_value->value)."',".
                      "parent= ".$work_attribute_type_allowed_value->parent." ,".
                      "child_order= ".$work_attribute_type_allowed_value->child_order." ,".
                      "description='".$this->sqlSafe($work_attribute_type_allowed_value->description)."',".
                      "gid='".$this->sqlSafe($work_attribute_type_allowed_value->gid)."' ".                      
	          "WHERE id=".$work_attribute_type_allowed_value->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Work_attribute_type_allowed_value by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM work_attribute_type_allowed_value WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>