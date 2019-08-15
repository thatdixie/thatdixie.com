<?php
require_once "MusicbrainzDB.php";
require      "Series_type.php";

/********************************************************************
 * Series_typeModel inherits MusicbrainzDB and provides functions to
 * map Series_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Series_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Series_type by id
     *
     * @return series_type
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "name,".
                      "entity_type,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      		               
	       "FROM series_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Series_type"));
    }

    /*********************************************************
     * Insert a new Series_type into musicbrainz database
     *
     * @param $series_type
     * @return n/a
     *********************************************************
     */
    public function insert($series_type)
    {
        $query="INSERT INTO series_type ( ".
	              "id,".
                      "name,".
                      "entity_type,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($series_type->name)."',".
                      "'".$this->sqlSafe($series_type->entity_type)."',".
                      " ".$series_type->parent." ,".
                      " ".$series_type->child_order." ,".
                      "'".$this->sqlSafe($series_type->description)."',".
                      "'".$this->sqlSafe($series_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Series_type into musicbrainz database
     * and return a Series_type with new autoincrement
     * primary key
     *
     * @param  $series_type
     * @return $series_type
     *********************************************************
     */
    public function insert2($series_type)
    {
        $query="INSERT INTO series_type ( ".
	              "id,".
                      "name,".
                      "entity_type,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($series_type->name)."',".
                      "'".$this->sqlSafe($series_type->entity_type)."',".
                      " ".$series_type->parent." ,".
                      " ".$series_type->child_order." ,".
                      "'".$this->sqlSafe($series_type->description)."',".
                      "'".$this->sqlSafe($series_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $series_type->id = $id;
	    return($series_type);	
    }


    /*********************************************************
     * Update a Series_type in musicbrainz database
     *
     * @param $series_type
     * @return n/a
     *********************************************************
     */
    public function update($series_type)
    {
        $query="UPDATE  series_type ".
	          "SET ".
                      "id= ".$series_type->id." ,".
                      "name='".$this->sqlSafe($series_type->name)."',".
                      "entity_type='".$this->sqlSafe($series_type->entity_type)."',".
                      "parent= ".$series_type->parent." ,".
                      "child_order= ".$series_type->child_order." ,".
                      "description='".$this->sqlSafe($series_type->description)."',".
                      "gid='".$this->sqlSafe($series_type->gid)."' ".                      
	          "WHERE id=".$series_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Series_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM series_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>