<?php
require_once "MusicbrainzDB.php";
require      "Recording.php";

/********************************************************************
 * RecordingModel inherits MusicbrainzDB and provides functions to
 * map Recording class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class RecordingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Recording by id
     *
     * @return recording
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "name,".
                      "artist_credit,".
                      "length,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "video ".                      		               
	       "FROM recording ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Recording"));
    }

    /*********************************************************
     * Insert a new Recording into musicbrainz database
     *
     * @param $recording
     * @return n/a
     *********************************************************
     */
    public function insert($recording)
    {
        $query="INSERT INTO recording ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "artist_credit,".
                      "length,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "video ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($recording->gid)."',".
                      "'".$this->sqlSafe($recording->name)."',".
                      " ".$recording->artist_credit." ,".
                      " ".$recording->length." ,".
                      "'".$this->sqlSafe($recording->comment)."',".
                      " ".$recording->edits_pending." ,".
                      "'".$this->sqlSafe($recording->last_updated)."',".
                      "'".$this->sqlSafe($recording->video)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Recording into musicbrainz database
     * and return a Recording with new autoincrement
     * primary key
     *
     * @param  $recording
     * @return $recording
     *********************************************************
     */
    public function insert2($recording)
    {
        $query="INSERT INTO recording ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "artist_credit,".
                      "length,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "video ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($recording->gid)."',".
                      "'".$this->sqlSafe($recording->name)."',".
                      " ".$recording->artist_credit." ,".
                      " ".$recording->length." ,".
                      "'".$this->sqlSafe($recording->comment)."',".
                      " ".$recording->edits_pending." ,".
                      "'".$this->sqlSafe($recording->last_updated)."',".
                      "'".$this->sqlSafe($recording->video)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $recording->id = $id;
	    return($recording);	
    }


    /*********************************************************
     * Update a Recording in musicbrainz database
     *
     * @param $recording
     * @return n/a
     *********************************************************
     */
    public function update($recording)
    {
        $query="UPDATE  recording ".
	          "SET ".
                      "id= ".$recording->id." ,".
                      "gid='".$this->sqlSafe($recording->gid)."',".
                      "name='".$this->sqlSafe($recording->name)."',".
                      "artist_credit= ".$recording->artist_credit." ,".
                      "length= ".$recording->length." ,".
                      "comment='".$this->sqlSafe($recording->comment)."',".
                      "edits_pending= ".$recording->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($recording->last_updated)."',".
                      "video='".$this->sqlSafe($recording->video)."' ".                      
	          "WHERE id=".$recording->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Recording by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM recording WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>