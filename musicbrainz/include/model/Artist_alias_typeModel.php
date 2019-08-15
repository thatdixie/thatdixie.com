<?php
require_once "MusicbrainzDB.php";
require      "Artist_alias_type.php";

/********************************************************************
 * Artist_alias_typeModel inherits MusicbrainzDB and provides functions to
 * map Artist_alias_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_alias_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Artist_alias_type by id
     *
     * @return artist_alias_type
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
	       "FROM artist_alias_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Artist_alias_type"));
    }

    /*********************************************************
     * Insert a new Artist_alias_type into musicbrainz database
     *
     * @param $artist_alias_type
     * @return n/a
     *********************************************************
     */
    public function insert($artist_alias_type)
    {
        $query="INSERT INTO artist_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($artist_alias_type->name)."',".
                      " ".$artist_alias_type->parent." ,".
                      " ".$artist_alias_type->child_order." ,".
                      "'".$this->sqlSafe($artist_alias_type->description)."',".
                      "'".$this->sqlSafe($artist_alias_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Artist_alias_type into musicbrainz database
     * and return a Artist_alias_type with new autoincrement
     * primary key
     *
     * @param  $artist_alias_type
     * @return $artist_alias_type
     *********************************************************
     */
    public function insert2($artist_alias_type)
    {
        $query="INSERT INTO artist_alias_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($artist_alias_type->name)."',".
                      " ".$artist_alias_type->parent." ,".
                      " ".$artist_alias_type->child_order." ,".
                      "'".$this->sqlSafe($artist_alias_type->description)."',".
                      "'".$this->sqlSafe($artist_alias_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $artist_alias_type->id = $id;
	    return($artist_alias_type);	
    }


    /*********************************************************
     * Update a Artist_alias_type in musicbrainz database
     *
     * @param $artist_alias_type
     * @return n/a
     *********************************************************
     */
    public function update($artist_alias_type)
    {
        $query="UPDATE  artist_alias_type ".
	          "SET ".
                      "id= ".$artist_alias_type->id." ,".
                      "name='".$this->sqlSafe($artist_alias_type->name)."',".
                      "parent= ".$artist_alias_type->parent." ,".
                      "child_order= ".$artist_alias_type->child_order." ,".
                      "description='".$this->sqlSafe($artist_alias_type->description)."',".
                      "gid='".$this->sqlSafe($artist_alias_type->gid)."' ".                      
	          "WHERE id=".$artist_alias_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Artist_alias_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM artist_alias_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>