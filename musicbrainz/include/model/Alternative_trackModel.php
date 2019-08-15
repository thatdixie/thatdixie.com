<?php
require_once "MusicbrainzDB.php";
require      "Alternative_track.php";

/********************************************************************
 * Alternative_trackModel inherits MusicbrainzDB and provides functions to
 * map Alternative_track class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Alternative_trackModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Alternative_track by id
     *
     * @return alternative_track
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "name,".
                      "artist_credit,".
                      "ref_count ".                      		               
	       "FROM alternative_track ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Alternative_track"));
    }

    /*********************************************************
     * Insert a new Alternative_track into musicbrainz database
     *
     * @param $alternative_track
     * @return n/a
     *********************************************************
     */
    public function insert($alternative_track)
    {
        $query="INSERT INTO alternative_track ( ".
	              "id,".
                      "name,".
                      "artist_credit,".
                      "ref_count ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($alternative_track->name)."',".
                      " ".$alternative_track->artist_credit." ,".
                      " ".$alternative_track->ref_count."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Alternative_track into musicbrainz database
     * and return a Alternative_track with new autoincrement
     * primary key
     *
     * @param  $alternative_track
     * @return $alternative_track
     *********************************************************
     */
    public function insert2($alternative_track)
    {
        $query="INSERT INTO alternative_track ( ".
	              "id,".
                      "name,".
                      "artist_credit,".
                      "ref_count ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($alternative_track->name)."',".
                      " ".$alternative_track->artist_credit." ,".
                      " ".$alternative_track->ref_count."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $alternative_track->id = $id;
	    return($alternative_track);	
    }


    /*********************************************************
     * Update a Alternative_track in musicbrainz database
     *
     * @param $alternative_track
     * @return n/a
     *********************************************************
     */
    public function update($alternative_track)
    {
        $query="UPDATE  alternative_track ".
	          "SET ".
                      "id= ".$alternative_track->id." ,".
                      "name='".$this->sqlSafe($alternative_track->name)."',".
                      "artist_credit= ".$alternative_track->artist_credit." ,".
                      "ref_count= ".$alternative_track->ref_count."  ".                      
	          "WHERE id=".$alternative_track->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Alternative_track by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM alternative_track WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>