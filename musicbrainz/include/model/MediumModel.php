<?php
require_once "MusicbrainzDB.php";
require      "Medium.php";

/********************************************************************
 * MediumModel inherits MusicbrainzDB and provides functions to
 * map Medium class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class MediumModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Medium by id
     *
     * @return medium
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "release,".
                      "position,".
                      "format,".
                      "name,".
                      "edits_pending,".
                      "last_updated,".
                      "track_count ".                      		               
	       "FROM medium ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Medium"));
    }

    /*********************************************************
     * Insert a new Medium into musicbrainz database
     *
     * @param $medium
     * @return n/a
     *********************************************************
     */
    public function insert($medium)
    {
        $query="INSERT INTO medium ( ".
	              "id,".
                      "release,".
                      "position,".
                      "format,".
                      "name,".
                      "edits_pending,".
                      "last_updated,".
                      "track_count ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$medium->release." ,".
                      " ".$medium->position." ,".
                      " ".$medium->format." ,".
                      "'".$this->sqlSafe($medium->name)."',".
                      " ".$medium->edits_pending." ,".
                      "'".$this->sqlSafe($medium->last_updated)."',".
                      " ".$medium->track_count."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Medium into musicbrainz database
     * and return a Medium with new autoincrement
     * primary key
     *
     * @param  $medium
     * @return $medium
     *********************************************************
     */
    public function insert2($medium)
    {
        $query="INSERT INTO medium ( ".
	              "id,".
                      "release,".
                      "position,".
                      "format,".
                      "name,".
                      "edits_pending,".
                      "last_updated,".
                      "track_count ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$medium->release." ,".
                      " ".$medium->position." ,".
                      " ".$medium->format." ,".
                      "'".$this->sqlSafe($medium->name)."',".
                      " ".$medium->edits_pending." ,".
                      "'".$this->sqlSafe($medium->last_updated)."',".
                      " ".$medium->track_count."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $medium->id = $id;
	    return($medium);	
    }


    /*********************************************************
     * Update a Medium in musicbrainz database
     *
     * @param $medium
     * @return n/a
     *********************************************************
     */
    public function update($medium)
    {
        $query="UPDATE  medium ".
	          "SET ".
                      "id= ".$medium->id." ,".
                      "release= ".$medium->release." ,".
                      "position= ".$medium->position." ,".
                      "format= ".$medium->format." ,".
                      "name='".$this->sqlSafe($medium->name)."',".
                      "edits_pending= ".$medium->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($medium->last_updated)."',".
                      "track_count= ".$medium->track_count."  ".                      
	          "WHERE id=".$medium->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Medium by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM medium WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>