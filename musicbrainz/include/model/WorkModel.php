<?php
require_once "MusicbrainzDB.php";
require      "Work.php";

/********************************************************************
 * WorkModel inherits MusicbrainzDB and provides functions to
 * map Work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class WorkModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Work by id
     *
     * @return work
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "name,".
                      "type,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "language ".                      		               
	       "FROM work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Work"));
    }

    /*********************************************************
     * Insert a new Work into musicbrainz database
     *
     * @param $work
     * @return n/a
     *********************************************************
     */
    public function insert($work)
    {
        $query="INSERT INTO work ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "type,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "language ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($work->gid)."',".
                      "'".$this->sqlSafe($work->name)."',".
                      " ".$work->type." ,".
                      "'".$this->sqlSafe($work->comment)."',".
                      " ".$work->edits_pending." ,".
                      "'".$this->sqlSafe($work->last_updated)."',".
                      " ".$work->language."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Work into musicbrainz database
     * and return a Work with new autoincrement
     * primary key
     *
     * @param  $work
     * @return $work
     *********************************************************
     */
    public function insert2($work)
    {
        $query="INSERT INTO work ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "type,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "language ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($work->gid)."',".
                      "'".$this->sqlSafe($work->name)."',".
                      " ".$work->type." ,".
                      "'".$this->sqlSafe($work->comment)."',".
                      " ".$work->edits_pending." ,".
                      "'".$this->sqlSafe($work->last_updated)."',".
                      " ".$work->language."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $work->id = $id;
	    return($work);	
    }


    /*********************************************************
     * Update a Work in musicbrainz database
     *
     * @param $work
     * @return n/a
     *********************************************************
     */
    public function update($work)
    {
        $query="UPDATE  work ".
	          "SET ".
                      "id= ".$work->id." ,".
                      "gid='".$this->sqlSafe($work->gid)."',".
                      "name='".$this->sqlSafe($work->name)."',".
                      "type= ".$work->type." ,".
                      "comment='".$this->sqlSafe($work->comment)."',".
                      "edits_pending= ".$work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($work->last_updated)."',".
                      "language= ".$work->language."  ".                      
	          "WHERE id=".$work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>