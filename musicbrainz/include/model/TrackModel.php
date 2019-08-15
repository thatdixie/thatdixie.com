<?php
require_once "MusicbrainzDB.php";
require      "Track.php";

/********************************************************************
 * TrackModel inherits MusicbrainzDB and provides functions to
 * map Track class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class TrackModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Track by id
     *
     * @return track
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "recording,".
                      "medium,".
                      "position,".
                      "number,".
                      "name,".
                      "artist_credit,".
                      "length,".
                      "edits_pending,".
                      "last_updated,".
                      "is_data_track ".                      		               
	       "FROM track ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Track"));
    }

    /*********************************************************
     * Insert a new Track into musicbrainz database
     *
     * @param $track
     * @return n/a
     *********************************************************
     */
    public function insert($track)
    {
        $query="INSERT INTO track ( ".
	              "id,".
                      "gid,".
                      "recording,".
                      "medium,".
                      "position,".
                      "number,".
                      "name,".
                      "artist_credit,".
                      "length,".
                      "edits_pending,".
                      "last_updated,".
                      "is_data_track ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($track->gid)."',".
                      " ".$track->recording." ,".
                      " ".$track->medium." ,".
                      " ".$track->position." ,".
                      "'".$this->sqlSafe($track->number)."',".
                      "'".$this->sqlSafe($track->name)."',".
                      " ".$track->artist_credit." ,".
                      " ".$track->length." ,".
                      " ".$track->edits_pending." ,".
                      "'".$this->sqlSafe($track->last_updated)."',".
                      "'".$this->sqlSafe($track->is_data_track)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Track into musicbrainz database
     * and return a Track with new autoincrement
     * primary key
     *
     * @param  $track
     * @return $track
     *********************************************************
     */
    public function insert2($track)
    {
        $query="INSERT INTO track ( ".
	              "id,".
                      "gid,".
                      "recording,".
                      "medium,".
                      "position,".
                      "number,".
                      "name,".
                      "artist_credit,".
                      "length,".
                      "edits_pending,".
                      "last_updated,".
                      "is_data_track ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($track->gid)."',".
                      " ".$track->recording." ,".
                      " ".$track->medium." ,".
                      " ".$track->position." ,".
                      "'".$this->sqlSafe($track->number)."',".
                      "'".$this->sqlSafe($track->name)."',".
                      " ".$track->artist_credit." ,".
                      " ".$track->length." ,".
                      " ".$track->edits_pending." ,".
                      "'".$this->sqlSafe($track->last_updated)."',".
                      "'".$this->sqlSafe($track->is_data_track)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $track->id = $id;
	    return($track);	
    }


    /*********************************************************
     * Update a Track in musicbrainz database
     *
     * @param $track
     * @return n/a
     *********************************************************
     */
    public function update($track)
    {
        $query="UPDATE  track ".
	          "SET ".
                      "id= ".$track->id." ,".
                      "gid='".$this->sqlSafe($track->gid)."',".
                      "recording= ".$track->recording." ,".
                      "medium= ".$track->medium." ,".
                      "position= ".$track->position." ,".
                      "number='".$this->sqlSafe($track->number)."',".
                      "name='".$this->sqlSafe($track->name)."',".
                      "artist_credit= ".$track->artist_credit." ,".
                      "length= ".$track->length." ,".
                      "edits_pending= ".$track->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($track->last_updated)."',".
                      "is_data_track='".$this->sqlSafe($track->is_data_track)."' ".                      
	          "WHERE id=".$track->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Track by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM track WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>