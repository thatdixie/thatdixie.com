<?php
require_once "MusicbrainzDB.php";
require      "Series_alias_type.php";

/********************************************************************
 * Series_alias_typeModel inherits MusicbrainzDB and provides functions to
 * map Series_alias_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Series_alias_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Series_alias_type by id
     *
     * @return series_alias_type
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
	       "FROM series_alias_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Series_alias_type"));
    }

    /*********************************************************
     * Insert a new Series_alias_type into musicbrainz database
     *
     * @param $series_alias_type
     * @return n/a
     *********************************************************
     */
    public function insert($series_alias_type)
    {
        $query="INSERT INTO series_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($series_alias_type->name)."',".
                      " ".$series_alias_type->parent." ,".
                      " ".$series_alias_type->child_order." ,".
                      "'".$this->sqlSafe($series_alias_type->description)."',".
                      "'".$this->sqlSafe($series_alias_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Series_alias_type into musicbrainz database
     * and return a Series_alias_type with new autoincrement
     * primary key
     *
     * @param  $series_alias_type
     * @return $series_alias_type
     *********************************************************
     */
    public function insert2($series_alias_type)
    {
        $query="INSERT INTO series_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($series_alias_type->name)."',".
                      " ".$series_alias_type->parent." ,".
                      " ".$series_alias_type->child_order." ,".
                      "'".$this->sqlSafe($series_alias_type->description)."',".
                      "'".$this->sqlSafe($series_alias_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $series_alias_type->id = $id;
	    return($series_alias_type);	
    }


    /*********************************************************
     * Update a Series_alias_type in musicbrainz database
     *
     * @param $series_alias_type
     * @return n/a
     *********************************************************
     */
    public function update($series_alias_type)
    {
        $query="UPDATE  series_alias_type ".
	          "SET ".
                      "id= ".$series_alias_type->id." ,".
                      "name='".$this->sqlSafe($series_alias_type->name)."',".
                      "parent= ".$series_alias_type->parent." ,".
                      "child_order= ".$series_alias_type->child_order." ,".
                      "description='".$this->sqlSafe($series_alias_type->description)."',".
                      "gid='".$this->sqlSafe($series_alias_type->gid)."' ".                      
	          "WHERE id=".$series_alias_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Series_alias_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM series_alias_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>