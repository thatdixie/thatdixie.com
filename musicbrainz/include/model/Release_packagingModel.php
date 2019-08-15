<?php
require_once "MusicbrainzDB.php";
require      "Release_packaging.php";

/********************************************************************
 * Release_packagingModel inherits MusicbrainzDB and provides functions to
 * map Release_packaging class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_packagingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Release_packaging by id
     *
     * @return release_packaging
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
	       "FROM release_packaging ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Release_packaging"));
    }

    /*********************************************************
     * Insert a new Release_packaging into musicbrainz database
     *
     * @param $release_packaging
     * @return n/a
     *********************************************************
     */
    public function insert($release_packaging)
    {
        $query="INSERT INTO release_packaging ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($release_packaging->name)."',".
                      " ".$release_packaging->parent." ,".
                      " ".$release_packaging->child_order." ,".
                      "'".$this->sqlSafe($release_packaging->description)."',".
                      "'".$this->sqlSafe($release_packaging->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Release_packaging into musicbrainz database
     * and return a Release_packaging with new autoincrement
     * primary key
     *
     * @param  $release_packaging
     * @return $release_packaging
     *********************************************************
     */
    public function insert2($release_packaging)
    {
        $query="INSERT INTO release_packaging ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($release_packaging->name)."',".
                      " ".$release_packaging->parent." ,".
                      " ".$release_packaging->child_order." ,".
                      "'".$this->sqlSafe($release_packaging->description)."',".
                      "'".$this->sqlSafe($release_packaging->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $release_packaging->id = $id;
	    return($release_packaging);	
    }


    /*********************************************************
     * Update a Release_packaging in musicbrainz database
     *
     * @param $release_packaging
     * @return n/a
     *********************************************************
     */
    public function update($release_packaging)
    {
        $query="UPDATE  release_packaging ".
	          "SET ".
                      "id= ".$release_packaging->id." ,".
                      "name='".$this->sqlSafe($release_packaging->name)."',".
                      "parent= ".$release_packaging->parent." ,".
                      "child_order= ".$release_packaging->child_order." ,".
                      "description='".$this->sqlSafe($release_packaging->description)."',".
                      "gid='".$this->sqlSafe($release_packaging->gid)."' ".                      
	          "WHERE id=".$release_packaging->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Release_packaging by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM release_packaging WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>