<?php
require_once "MusicbrainzDB.php";
require      "Label_type.php";

/********************************************************************
 * Label_typeModel inherits MusicbrainzDB and provides functions to
 * map Label_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Label_type by id
     *
     * @return label_type
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
	       "FROM label_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Label_type"));
    }

    /*********************************************************
     * Insert a new Label_type into musicbrainz database
     *
     * @param $label_type
     * @return n/a
     *********************************************************
     */
    public function insert($label_type)
    {
        $query="INSERT INTO label_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($label_type->name)."',".
                      " ".$label_type->parent." ,".
                      " ".$label_type->child_order." ,".
                      "'".$this->sqlSafe($label_type->description)."',".
                      "'".$this->sqlSafe($label_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Label_type into musicbrainz database
     * and return a Label_type with new autoincrement
     * primary key
     *
     * @param  $label_type
     * @return $label_type
     *********************************************************
     */
    public function insert2($label_type)
    {
        $query="INSERT INTO label_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($label_type->name)."',".
                      " ".$label_type->parent." ,".
                      " ".$label_type->child_order." ,".
                      "'".$this->sqlSafe($label_type->description)."',".
                      "'".$this->sqlSafe($label_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $label_type->id = $id;
	    return($label_type);	
    }


    /*********************************************************
     * Update a Label_type in musicbrainz database
     *
     * @param $label_type
     * @return n/a
     *********************************************************
     */
    public function update($label_type)
    {
        $query="UPDATE  label_type ".
	          "SET ".
                      "id= ".$label_type->id." ,".
                      "name='".$this->sqlSafe($label_type->name)."',".
                      "parent= ".$label_type->parent." ,".
                      "child_order= ".$label_type->child_order." ,".
                      "description='".$this->sqlSafe($label_type->description)."',".
                      "gid='".$this->sqlSafe($label_type->gid)."' ".                      
	          "WHERE id=".$label_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Label_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM label_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>