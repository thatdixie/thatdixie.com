<?php
require_once "MusicbrainzDB.php";
require      "Place_alias_type.php";

/********************************************************************
 * Place_alias_typeModel inherits MusicbrainzDB and provides functions to
 * map Place_alias_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Place_alias_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Place_alias_type by id
     *
     * @return place_alias_type
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
	       "FROM place_alias_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Place_alias_type"));
    }

    /*********************************************************
     * Insert a new Place_alias_type into musicbrainz database
     *
     * @param $place_alias_type
     * @return n/a
     *********************************************************
     */
    public function insert($place_alias_type)
    {
        $query="INSERT INTO place_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($place_alias_type->name)."',".
                      " ".$place_alias_type->parent." ,".
                      " ".$place_alias_type->child_order." ,".
                      "'".$this->sqlSafe($place_alias_type->description)."',".
                      "'".$this->sqlSafe($place_alias_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Place_alias_type into musicbrainz database
     * and return a Place_alias_type with new autoincrement
     * primary key
     *
     * @param  $place_alias_type
     * @return $place_alias_type
     *********************************************************
     */
    public function insert2($place_alias_type)
    {
        $query="INSERT INTO place_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($place_alias_type->name)."',".
                      " ".$place_alias_type->parent." ,".
                      " ".$place_alias_type->child_order." ,".
                      "'".$this->sqlSafe($place_alias_type->description)."',".
                      "'".$this->sqlSafe($place_alias_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $place_alias_type->id = $id;
	    return($place_alias_type);	
    }


    /*********************************************************
     * Update a Place_alias_type in musicbrainz database
     *
     * @param $place_alias_type
     * @return n/a
     *********************************************************
     */
    public function update($place_alias_type)
    {
        $query="UPDATE  place_alias_type ".
	          "SET ".
                      "id= ".$place_alias_type->id." ,".
                      "name='".$this->sqlSafe($place_alias_type->name)."',".
                      "parent= ".$place_alias_type->parent." ,".
                      "child_order= ".$place_alias_type->child_order." ,".
                      "description='".$this->sqlSafe($place_alias_type->description)."',".
                      "gid='".$this->sqlSafe($place_alias_type->gid)."' ".                      
	          "WHERE id=".$place_alias_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Place_alias_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM place_alias_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>