<?php
require_once "MusicbrainzDB.php";
require      "Instrument_type.php";

/********************************************************************
 * Instrument_typeModel inherits MusicbrainzDB and provides functions to
 * map Instrument_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Instrument_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Instrument_type by id
     *
     * @return instrument_type
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
	       "FROM instrument_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Instrument_type"));
    }

    /*********************************************************
     * Insert a new Instrument_type into musicbrainz database
     *
     * @param $instrument_type
     * @return n/a
     *********************************************************
     */
    public function insert($instrument_type)
    {
        $query="INSERT INTO instrument_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($instrument_type->name)."',".
                      " ".$instrument_type->parent." ,".
                      " ".$instrument_type->child_order." ,".
                      "'".$this->sqlSafe($instrument_type->description)."',".
                      "'".$this->sqlSafe($instrument_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Instrument_type into musicbrainz database
     * and return a Instrument_type with new autoincrement
     * primary key
     *
     * @param  $instrument_type
     * @return $instrument_type
     *********************************************************
     */
    public function insert2($instrument_type)
    {
        $query="INSERT INTO instrument_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($instrument_type->name)."',".
                      " ".$instrument_type->parent." ,".
                      " ".$instrument_type->child_order." ,".
                      "'".$this->sqlSafe($instrument_type->description)."',".
                      "'".$this->sqlSafe($instrument_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $instrument_type->id = $id;
	    return($instrument_type);	
    }


    /*********************************************************
     * Update a Instrument_type in musicbrainz database
     *
     * @param $instrument_type
     * @return n/a
     *********************************************************
     */
    public function update($instrument_type)
    {
        $query="UPDATE  instrument_type ".
	          "SET ".
                      "id= ".$instrument_type->id." ,".
                      "name='".$this->sqlSafe($instrument_type->name)."',".
                      "parent= ".$instrument_type->parent." ,".
                      "child_order= ".$instrument_type->child_order." ,".
                      "description='".$this->sqlSafe($instrument_type->description)."',".
                      "gid='".$this->sqlSafe($instrument_type->gid)."' ".                      
	          "WHERE id=".$instrument_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Instrument_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM instrument_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>