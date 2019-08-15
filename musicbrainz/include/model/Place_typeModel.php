<?php
require_once "MusicbrainzDB.php";
require      "Place_type.php";

/********************************************************************
 * Place_typeModel inherits MusicbrainzDB and provides functions to
 * map Place_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Place_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Place_type by id
     *
     * @return place_type
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
	       "FROM place_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Place_type"));
    }

    /*********************************************************
     * Insert a new Place_type into musicbrainz database
     *
     * @param $place_type
     * @return n/a
     *********************************************************
     */
    public function insert($place_type)
    {
        $query="INSERT INTO place_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($place_type->name)."',".
                      " ".$place_type->parent." ,".
                      " ".$place_type->child_order." ,".
                      "'".$this->sqlSafe($place_type->description)."',".
                      "'".$this->sqlSafe($place_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Place_type into musicbrainz database
     * and return a Place_type with new autoincrement
     * primary key
     *
     * @param  $place_type
     * @return $place_type
     *********************************************************
     */
    public function insert2($place_type)
    {
        $query="INSERT INTO place_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($place_type->name)."',".
                      " ".$place_type->parent." ,".
                      " ".$place_type->child_order." ,".
                      "'".$this->sqlSafe($place_type->description)."',".
                      "'".$this->sqlSafe($place_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $place_type->id = $id;
	    return($place_type);	
    }


    /*********************************************************
     * Update a Place_type in musicbrainz database
     *
     * @param $place_type
     * @return n/a
     *********************************************************
     */
    public function update($place_type)
    {
        $query="UPDATE  place_type ".
	          "SET ".
                      "id= ".$place_type->id." ,".
                      "name='".$this->sqlSafe($place_type->name)."',".
                      "parent= ".$place_type->parent." ,".
                      "child_order= ".$place_type->child_order." ,".
                      "description='".$this->sqlSafe($place_type->description)."',".
                      "gid='".$this->sqlSafe($place_type->gid)."' ".                      
	          "WHERE id=".$place_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Place_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM place_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>