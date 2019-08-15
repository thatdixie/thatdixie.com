<?php
require_once "MusicbrainzDB.php";
require      "Instrument_alias_type.php";

/********************************************************************
 * Instrument_alias_typeModel inherits MusicbrainzDB and provides functions to
 * map Instrument_alias_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Instrument_alias_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Instrument_alias_type by id
     *
     * @return instrument_alias_type
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
	       "FROM instrument_alias_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Instrument_alias_type"));
    }

    /*********************************************************
     * Insert a new Instrument_alias_type into musicbrainz database
     *
     * @param $instrument_alias_type
     * @return n/a
     *********************************************************
     */
    public function insert($instrument_alias_type)
    {
        $query="INSERT INTO instrument_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($instrument_alias_type->name)."',".
                      " ".$instrument_alias_type->parent." ,".
                      " ".$instrument_alias_type->child_order." ,".
                      "'".$this->sqlSafe($instrument_alias_type->description)."',".
                      "'".$this->sqlSafe($instrument_alias_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Instrument_alias_type into musicbrainz database
     * and return a Instrument_alias_type with new autoincrement
     * primary key
     *
     * @param  $instrument_alias_type
     * @return $instrument_alias_type
     *********************************************************
     */
    public function insert2($instrument_alias_type)
    {
        $query="INSERT INTO instrument_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($instrument_alias_type->name)."',".
                      " ".$instrument_alias_type->parent." ,".
                      " ".$instrument_alias_type->child_order." ,".
                      "'".$this->sqlSafe($instrument_alias_type->description)."',".
                      "'".$this->sqlSafe($instrument_alias_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $instrument_alias_type->id = $id;
	    return($instrument_alias_type);	
    }


    /*********************************************************
     * Update a Instrument_alias_type in musicbrainz database
     *
     * @param $instrument_alias_type
     * @return n/a
     *********************************************************
     */
    public function update($instrument_alias_type)
    {
        $query="UPDATE  instrument_alias_type ".
	          "SET ".
                      "id= ".$instrument_alias_type->id." ,".
                      "name='".$this->sqlSafe($instrument_alias_type->name)."',".
                      "parent= ".$instrument_alias_type->parent." ,".
                      "child_order= ".$instrument_alias_type->child_order." ,".
                      "description='".$this->sqlSafe($instrument_alias_type->description)."',".
                      "gid='".$this->sqlSafe($instrument_alias_type->gid)."' ".                      
	          "WHERE id=".$instrument_alias_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Instrument_alias_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM instrument_alias_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>