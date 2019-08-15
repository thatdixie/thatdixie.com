<?php
require_once "MusicbrainzDB.php";
require      "Release_alias_type.php";

/********************************************************************
 * Release_alias_typeModel inherits MusicbrainzDB and provides functions to
 * map Release_alias_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_alias_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Release_alias_type by id
     *
     * @return release_alias_type
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
	       "FROM release_alias_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Release_alias_type"));
    }

    /*********************************************************
     * Insert a new Release_alias_type into musicbrainz database
     *
     * @param $release_alias_type
     * @return n/a
     *********************************************************
     */
    public function insert($release_alias_type)
    {
        $query="INSERT INTO release_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($release_alias_type->name)."',".
                      " ".$release_alias_type->parent." ,".
                      " ".$release_alias_type->child_order." ,".
                      "'".$this->sqlSafe($release_alias_type->description)."',".
                      "'".$this->sqlSafe($release_alias_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Release_alias_type into musicbrainz database
     * and return a Release_alias_type with new autoincrement
     * primary key
     *
     * @param  $release_alias_type
     * @return $release_alias_type
     *********************************************************
     */
    public function insert2($release_alias_type)
    {
        $query="INSERT INTO release_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($release_alias_type->name)."',".
                      " ".$release_alias_type->parent." ,".
                      " ".$release_alias_type->child_order." ,".
                      "'".$this->sqlSafe($release_alias_type->description)."',".
                      "'".$this->sqlSafe($release_alias_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $release_alias_type->id = $id;
	    return($release_alias_type);	
    }


    /*********************************************************
     * Update a Release_alias_type in musicbrainz database
     *
     * @param $release_alias_type
     * @return n/a
     *********************************************************
     */
    public function update($release_alias_type)
    {
        $query="UPDATE  release_alias_type ".
	          "SET ".
                      "id= ".$release_alias_type->id." ,".
                      "name='".$this->sqlSafe($release_alias_type->name)."',".
                      "parent= ".$release_alias_type->parent." ,".
                      "child_order= ".$release_alias_type->child_order." ,".
                      "description='".$this->sqlSafe($release_alias_type->description)."',".
                      "gid='".$this->sqlSafe($release_alias_type->gid)."' ".                      
	          "WHERE id=".$release_alias_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Release_alias_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM release_alias_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>