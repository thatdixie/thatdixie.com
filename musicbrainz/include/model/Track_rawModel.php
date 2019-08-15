<?php
require_once "MusicbrainzDB.php";
require      "Track_raw.php";

/********************************************************************
 * Track_rawModel inherits MusicbrainzDB and provides functions to
 * map Track_raw class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Track_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Track_raw by id
     *
     * @return track_raw
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "release,".
                      "title,".
                      "artist,".
                      "sequence ".                      		               
	       "FROM track_raw ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Track_raw"));
    }

    /*********************************************************
     * Insert a new Track_raw into musicbrainz database
     *
     * @param $track_raw
     * @return n/a
     *********************************************************
     */
    public function insert($track_raw)
    {
        $query="INSERT INTO track_raw ( ".
	              "id,".
                      "release,".
                      "title,".
                      "artist,".
                      "sequence ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$track_raw->release." ,".
                      "'".$this->sqlSafe($track_raw->title)."',".
                      "'".$this->sqlSafe($track_raw->artist)."',".
                      " ".$track_raw->sequence."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Track_raw into musicbrainz database
     * and return a Track_raw with new autoincrement
     * primary key
     *
     * @param  $track_raw
     * @return $track_raw
     *********************************************************
     */
    public function insert2($track_raw)
    {
        $query="INSERT INTO track_raw ( ".
	              "id,".
                      "release,".
                      "title,".
                      "artist,".
                      "sequence ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$track_raw->release." ,".
                      "'".$this->sqlSafe($track_raw->title)."',".
                      "'".$this->sqlSafe($track_raw->artist)."',".
                      " ".$track_raw->sequence."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $track_raw->id = $id;
	    return($track_raw);	
    }


    /*********************************************************
     * Update a Track_raw in musicbrainz database
     *
     * @param $track_raw
     * @return n/a
     *********************************************************
     */
    public function update($track_raw)
    {
        $query="UPDATE  track_raw ".
	          "SET ".
                      "id= ".$track_raw->id." ,".
                      "release= ".$track_raw->release." ,".
                      "title='".$this->sqlSafe($track_raw->title)."',".
                      "artist='".$this->sqlSafe($track_raw->artist)."',".
                      "sequence= ".$track_raw->sequence."  ".                      
	          "WHERE id=".$track_raw->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Track_raw by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM track_raw WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>