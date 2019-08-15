<?php
require_once "MusicbrainzDB.php";
require      "Label_alias_type.php";

/********************************************************************
 * Label_alias_typeModel inherits MusicbrainzDB and provides functions to
 * map Label_alias_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Label_alias_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Label_alias_type by id
     *
     * @return label_alias_type
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
	       "FROM label_alias_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Label_alias_type"));
    }

    /*********************************************************
     * Insert a new Label_alias_type into musicbrainz database
     *
     * @param $label_alias_type
     * @return n/a
     *********************************************************
     */
    public function insert($label_alias_type)
    {
        $query="INSERT INTO label_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($label_alias_type->name)."',".
                      " ".$label_alias_type->parent." ,".
                      " ".$label_alias_type->child_order." ,".
                      "'".$this->sqlSafe($label_alias_type->description)."',".
                      "'".$this->sqlSafe($label_alias_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Label_alias_type into musicbrainz database
     * and return a Label_alias_type with new autoincrement
     * primary key
     *
     * @param  $label_alias_type
     * @return $label_alias_type
     *********************************************************
     */
    public function insert2($label_alias_type)
    {
        $query="INSERT INTO label_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($label_alias_type->name)."',".
                      " ".$label_alias_type->parent." ,".
                      " ".$label_alias_type->child_order." ,".
                      "'".$this->sqlSafe($label_alias_type->description)."',".
                      "'".$this->sqlSafe($label_alias_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $label_alias_type->id = $id;
	    return($label_alias_type);	
    }


    /*********************************************************
     * Update a Label_alias_type in musicbrainz database
     *
     * @param $label_alias_type
     * @return n/a
     *********************************************************
     */
    public function update($label_alias_type)
    {
        $query="UPDATE  label_alias_type ".
	          "SET ".
                      "id= ".$label_alias_type->id." ,".
                      "name='".$this->sqlSafe($label_alias_type->name)."',".
                      "parent= ".$label_alias_type->parent." ,".
                      "child_order= ".$label_alias_type->child_order." ,".
                      "description='".$this->sqlSafe($label_alias_type->description)."',".
                      "gid='".$this->sqlSafe($label_alias_type->gid)."' ".                      
	          "WHERE id=".$label_alias_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Label_alias_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM label_alias_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>