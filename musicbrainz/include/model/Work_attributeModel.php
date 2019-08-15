<?php
require_once "MusicbrainzDB.php";
require      "Work_attribute.php";

/********************************************************************
 * Work_attributeModel inherits MusicbrainzDB and provides functions to
 * map Work_attribute class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Work_attributeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Work_attribute by id
     *
     * @return work_attribute
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "work,".
                      "work_attribute_type,".
                      "work_attribute_type_allowed_value,".
                      "work_attribute_text ".                      		               
	       "FROM work_attribute ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Work_attribute"));
    }

    /*********************************************************
     * Insert a new Work_attribute into musicbrainz database
     *
     * @param $work_attribute
     * @return n/a
     *********************************************************
     */
    public function insert($work_attribute)
    {
        $query="INSERT INTO work_attribute ( ".
	              "id,".
                      "work,".
                      "work_attribute_type,".
                      "work_attribute_type_allowed_value,".
                      "work_attribute_text ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$work_attribute->work." ,".
                      " ".$work_attribute->work_attribute_type." ,".
                      " ".$work_attribute->work_attribute_type_allowed_value." ,".
                      "'".$this->sqlSafe($work_attribute->work_attribute_text)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Work_attribute into musicbrainz database
     * and return a Work_attribute with new autoincrement
     * primary key
     *
     * @param  $work_attribute
     * @return $work_attribute
     *********************************************************
     */
    public function insert2($work_attribute)
    {
        $query="INSERT INTO work_attribute ( ".
	              "id,".
                      "work,".
                      "work_attribute_type,".
                      "work_attribute_type_allowed_value,".
                      "work_attribute_text ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$work_attribute->work." ,".
                      " ".$work_attribute->work_attribute_type." ,".
                      " ".$work_attribute->work_attribute_type_allowed_value." ,".
                      "'".$this->sqlSafe($work_attribute->work_attribute_text)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $work_attribute->id = $id;
	    return($work_attribute);	
    }


    /*********************************************************
     * Update a Work_attribute in musicbrainz database
     *
     * @param $work_attribute
     * @return n/a
     *********************************************************
     */
    public function update($work_attribute)
    {
        $query="UPDATE  work_attribute ".
	          "SET ".
                      "id= ".$work_attribute->id." ,".
                      "work= ".$work_attribute->work." ,".
                      "work_attribute_type= ".$work_attribute->work_attribute_type." ,".
                      "work_attribute_type_allowed_value= ".$work_attribute->work_attribute_type_allowed_value." ,".
                      "work_attribute_text='".$this->sqlSafe($work_attribute->work_attribute_text)."' ".                      
	          "WHERE id=".$work_attribute->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Work_attribute by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM work_attribute WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>