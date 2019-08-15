<?php
require_once "MusicbrainzDB.php";
require      "Artist_type.php";

/********************************************************************
 * Artist_typeModel inherits MusicbrainzDB and provides functions to
 * map Artist_type class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_typeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Artist_type by id
     *
     * @return artist_type
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
	       "FROM artist_type ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Artist_type"));
    }

    /*********************************************************
     * Insert a new Artist_type into musicbrainz database
     *
     * @param $artist_type
     * @return n/a
     *********************************************************
     */
    public function insert($artist_type)
    {
        $query="INSERT INTO artist_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($artist_type->name)."',".
                      " ".$artist_type->parent." ,".
                      " ".$artist_type->child_order." ,".
                      "'".$this->sqlSafe($artist_type->description)."',".
                      "'".$this->sqlSafe($artist_type->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Artist_type into musicbrainz database
     * and return a Artist_type with new autoincrement
     * primary key
     *
     * @param  $artist_type
     * @return $artist_type
     *********************************************************
     */
    public function insert2($artist_type)
    {
        $query="INSERT INTO artist_type ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($artist_type->name)."',".
                      " ".$artist_type->parent." ,".
                      " ".$artist_type->child_order." ,".
                      "'".$this->sqlSafe($artist_type->description)."',".
                      "'".$this->sqlSafe($artist_type->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $artist_type->id = $id;
	    return($artist_type);	
    }


    /*********************************************************
     * Update a Artist_type in musicbrainz database
     *
     * @param $artist_type
     * @return n/a
     *********************************************************
     */
    public function update($artist_type)
    {
        $query="UPDATE  artist_type ".
	          "SET ".
                      "id= ".$artist_type->id." ,".
                      "name='".$this->sqlSafe($artist_type->name)."',".
                      "parent= ".$artist_type->parent." ,".
                      "child_order= ".$artist_type->child_order." ,".
                      "description='".$this->sqlSafe($artist_type->description)."',".
                      "gid='".$this->sqlSafe($artist_type->gid)."' ".                      
	          "WHERE id=".$artist_type->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Artist_type by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM artist_type WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>