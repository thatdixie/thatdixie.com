<?php
require_once "MusicbrainzDB.php";
require      "Series_ordering_type.php";

/********************************************************************
 * Series_ordering_typeModel inherits MusicbrainzDB and provides functions to
 * map Series_ordering_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Series_ordering_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Series_ordering_type by id
     *
     * @return series_ordering_type
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
	       "FROM series_ordering_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Series_ordering_type"));
    }

    /*********************************************************
     * Insert a new Series_ordering_type into musicbrainz database
     *
     * @param $series_ordering_type
     * @return n/a
     *********************************************************
     */
    public function insert($series_ordering_type)
    {
        $query="INSERT INTO series_ordering_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($series_ordering_type->name)."',".
                      " ".$series_ordering_type->parent." ,".
                      " ".$series_ordering_type->child_order." ,".
                      "'".$this->sqlSafe($series_ordering_type->description)."',".
                      "'".$this->sqlSafe($series_ordering_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Series_ordering_type into musicbrainz database
     * and return a Series_ordering_type with new autoincrement
     * primary key
     *
     * @param  $series_ordering_type
     * @return $series_ordering_type
     *********************************************************
     */
    public function insert2($series_ordering_type)
    {
        $query="INSERT INTO series_ordering_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($series_ordering_type->name)."',".
                      " ".$series_ordering_type->parent." ,".
                      " ".$series_ordering_type->child_order." ,".
                      "'".$this->sqlSafe($series_ordering_type->description)."',".
                      "'".$this->sqlSafe($series_ordering_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $series_ordering_type->id = $id;
	    return($series_ordering_type);	
    }


    /*********************************************************
     * Update a Series_ordering_type in musicbrainz database
     *
     * @param $series_ordering_type
     * @return n/a
     *********************************************************
     */
    public function update($series_ordering_type)
    {
        $query="UPDATE  series_ordering_type ".
	          "SET ".
                      "id= ".$series_ordering_type->id." ,".
                      "name='".$this->sqlSafe($series_ordering_type->name)."',".
                      "parent= ".$series_ordering_type->parent." ,".
                      "child_order= ".$series_ordering_type->child_order." ,".
                      "description='".$this->sqlSafe($series_ordering_type->description)."',".
                      "gid='".$this->sqlSafe($series_ordering_type->gid)."' ".                      
	          "WHERE id=".$series_ordering_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Series_ordering_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM series_ordering_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>