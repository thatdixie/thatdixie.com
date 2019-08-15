<?php
require_once "MusicbrainzDB.php";
require      "Release_group.php";

/********************************************************************
 * Release_groupModel inherits MusicbrainzDB and provides functions to
 * map Release_group class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_groupModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Release_group by id
     *
     * @return release_group
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "name,".
                      "artist_credit,".
                      "type,".
                      "comment,".
                      "edits_pending,".
                      "last_updated ".                      		               
	       "FROM release_group ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Release_group"));
    }

    /*********************************************************
     * Insert a new Release_group into musicbrainz database
     *
     * @param $release_group
     * @return n/a
     *********************************************************
     */
    public function insert($release_group)
    {
        $query="INSERT INTO release_group ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "artist_credit,".
                      "type,".
                      "comment,".
                      "edits_pending,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($release_group->gid)."',".
                      "'".$this->sqlSafe($release_group->name)."',".
                      " ".$release_group->artist_credit." ,".
                      " ".$release_group->type." ,".
                      "'".$this->sqlSafe($release_group->comment)."',".
                      " ".$release_group->edits_pending." ,".
                      "'".$this->sqlSafe($release_group->last_updated)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Release_group into musicbrainz database
     * and return a Release_group with new autoincrement
     * primary key
     *
     * @param  $release_group
     * @return $release_group
     *********************************************************
     */
    public function insert2($release_group)
    {
        $query="INSERT INTO release_group ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "artist_credit,".
                      "type,".
                      "comment,".
                      "edits_pending,".
                      "last_updated ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($release_group->gid)."',".
                      "'".$this->sqlSafe($release_group->name)."',".
                      " ".$release_group->artist_credit." ,".
                      " ".$release_group->type." ,".
                      "'".$this->sqlSafe($release_group->comment)."',".
                      " ".$release_group->edits_pending." ,".
                      "'".$this->sqlSafe($release_group->last_updated)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $release_group->id = $id;
	    return($release_group);	
    }


    /*********************************************************
     * Update a Release_group in musicbrainz database
     *
     * @param $release_group
     * @return n/a
     *********************************************************
     */
    public function update($release_group)
    {
        $query="UPDATE  release_group ".
	          "SET ".
                      "id= ".$release_group->id." ,".
                      "gid='".$this->sqlSafe($release_group->gid)."',".
                      "name='".$this->sqlSafe($release_group->name)."',".
                      "artist_credit= ".$release_group->artist_credit." ,".
                      "type= ".$release_group->type." ,".
                      "comment='".$this->sqlSafe($release_group->comment)."',".
                      "edits_pending= ".$release_group->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($release_group->last_updated)."' ".                      
	          "WHERE id=".$release_group->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Release_group by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM release_group WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>