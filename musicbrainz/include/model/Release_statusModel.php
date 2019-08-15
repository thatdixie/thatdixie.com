<?php
require_once "MusicbrainzDB.php";
require      "Release_status.php";

/********************************************************************
 * Release_statusModel inherits MusicbrainzDB and provides functions to
 * map Release_status class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_statusModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Release_status by id
     *
     * @return release_status
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
	       "FROM release_status ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Release_status"));
    }

    /*********************************************************
     * Insert a new Release_status into musicbrainz database
     *
     * @param $release_status
     * @return n/a
     *********************************************************
     */
    public function insert($release_status)
    {
        $query="INSERT INTO release_status ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($release_status->name)."',".
                      " ".$release_status->parent." ,".
                      " ".$release_status->child_order." ,".
                      "'".$this->sqlSafe($release_status->description)."',".
                      "'".$this->sqlSafe($release_status->gid)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Release_status into musicbrainz database
     * and return a Release_status with new autoincrement
     * primary key
     *
     * @param  $release_status
     * @return $release_status
     *********************************************************
     */
    public function insert2($release_status)
    {
        $query="INSERT INTO release_status ( ".
	              "id,".
                      "name,".
                      "parent,".
                      "child_order,".
                      "description,".
                      "gid ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($release_status->name)."',".
                      " ".$release_status->parent." ,".
                      " ".$release_status->child_order." ,".
                      "'".$this->sqlSafe($release_status->description)."',".
                      "'".$this->sqlSafe($release_status->gid)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $release_status->id = $id;
	    return($release_status);	
    }


    /*********************************************************
     * Update a Release_status in musicbrainz database
     *
     * @param $release_status
     * @return n/a
     *********************************************************
     */
    public function update($release_status)
    {
        $query="UPDATE  release_status ".
	          "SET ".
                      "id= ".$release_status->id." ,".
                      "name='".$this->sqlSafe($release_status->name)."',".
                      "parent= ".$release_status->parent." ,".
                      "child_order= ".$release_status->child_order." ,".
                      "description='".$this->sqlSafe($release_status->description)."',".
                      "gid='".$this->sqlSafe($release_status->gid)."' ".                      
	          "WHERE id=".$release_status->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Release_status by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM release_status WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>