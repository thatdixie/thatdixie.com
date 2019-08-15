<?php
require_once "MusicbrainzDB.php";
require      "Area_alias_type.php";

/********************************************************************
 * Area_alias_typeModel inherits MusicbrainzDB and provides functions to
 * map Area_alias_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Area_alias_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Area_alias_type by id
     *
     * @return area_alias_type
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
	       "FROM area_alias_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Area_alias_type"));
    }

    /*********************************************************
     * Insert a new Area_alias_type into musicbrainz database
     *
     * @param $area_alias_type
     * @return n/a
     *********************************************************
     */
    public function insert($area_alias_type)
    {
        $query="INSERT INTO area_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($area_alias_type->name)."',".
                      " ".$area_alias_type->parent." ,".
                      " ".$area_alias_type->child_order." ,".
                      "'".$this->sqlSafe($area_alias_type->description)."',".
                      "'".$this->sqlSafe($area_alias_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Area_alias_type into musicbrainz database
     * and return a Area_alias_type with new autoincrement
     * primary key
     *
     * @param  $area_alias_type
     * @return $area_alias_type
     *********************************************************
     */
    public function insert2($area_alias_type)
    {
        $query="INSERT INTO area_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($area_alias_type->name)."',".
                      " ".$area_alias_type->parent." ,".
                      " ".$area_alias_type->child_order." ,".
                      "'".$this->sqlSafe($area_alias_type->description)."',".
                      "'".$this->sqlSafe($area_alias_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $area_alias_type->id = $id;
	    return($area_alias_type);	
    }


    /*********************************************************
     * Update a Area_alias_type in musicbrainz database
     *
     * @param $area_alias_type
     * @return n/a
     *********************************************************
     */
    public function update($area_alias_type)
    {
        $query="UPDATE  area_alias_type ".
	          "SET ".
                      "id= ".$area_alias_type->id." ,".
                      "name='".$this->sqlSafe($area_alias_type->name)."',".
                      "parent= ".$area_alias_type->parent." ,".
                      "child_order= ".$area_alias_type->child_order." ,".
                      "description='".$this->sqlSafe($area_alias_type->description)."',".
                      "gid='".$this->sqlSafe($area_alias_type->gid)."' ".                      
	          "WHERE id=".$area_alias_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Area_alias_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM area_alias_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>