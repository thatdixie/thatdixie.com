<?php
require_once "MusicbrainzDB.php";
require      "Area_type.php";

/********************************************************************
 * Area_typeModel inherits MusicbrainzDB and provides functions to
 * map Area_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Area_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Area_type by id
     *
     * @return area_type
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
	       "FROM area_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Area_type"));
    }

    /*********************************************************
     * Insert a new Area_type into musicbrainz database
     *
     * @param $area_type
     * @return n/a
     *********************************************************
     */
    public function insert($area_type)
    {
        $query="INSERT INTO area_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($area_type->name)."',".
                      " ".$area_type->parent." ,".
                      " ".$area_type->child_order." ,".
                      "'".$this->sqlSafe($area_type->description)."',".
                      "'".$this->sqlSafe($area_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Area_type into musicbrainz database
     * and return a Area_type with new autoincrement
     * primary key
     *
     * @param  $area_type
     * @return $area_type
     *********************************************************
     */
    public function insert2($area_type)
    {
        $query="INSERT INTO area_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($area_type->name)."',".
                      " ".$area_type->parent." ,".
                      " ".$area_type->child_order." ,".
                      "'".$this->sqlSafe($area_type->description)."',".
                      "'".$this->sqlSafe($area_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $area_type->id = $id;
	    return($area_type);	
    }


    /*********************************************************
     * Update a Area_type in musicbrainz database
     *
     * @param $area_type
     * @return n/a
     *********************************************************
     */
    public function update($area_type)
    {
        $query="UPDATE  area_type ".
	          "SET ".
                      "id= ".$area_type->id." ,".
                      "name='".$this->sqlSafe($area_type->name)."',".
                      "parent= ".$area_type->parent." ,".
                      "child_order= ".$area_type->child_order." ,".
                      "description='".$this->sqlSafe($area_type->description)."',".
                      "gid='".$this->sqlSafe($area_type->gid)."' ".                      
	          "WHERE id=".$area_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Area_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM area_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>