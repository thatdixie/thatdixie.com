<?php
require_once "MusicbrainzDB.php";
require      "L_artist_recording.php";

/********************************************************************
 * L_artist_recordingModel inherits MusicbrainzDB and provides functions to
 * map L_artist_recording class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_artist_recordingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_artist_recording by id
     *
     * @return l_artist_recording
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "link,".
                      "entity0,".
                      "entity1,".
                      "edits_pending,".
                      "last_updated,".
                      "link_order,".
                      "entity0_credit,".
                      "entity1_credit ".                      		               
	       "FROM l_artist_recording ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_artist_recording"));
    }

    /*********************************************************
     * Insert a new L_artist_recording into musicbrainz database
     *
     * @param $l_artist_recording
     * @return n/a
     *********************************************************
     */
    public function insert($l_artist_recording)
    {
        $query="INSERT INTO l_artist_recording ( ".
	              "id,".
                      "link,".
                      "entity0,".
                      "entity1,".
                      "edits_pending,".
                      "last_updated,".
                      "link_order,".
                      "entity0_credit,".
                      "entity1_credit ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$l_artist_recording->link." ,".
                      " ".$l_artist_recording->entity0." ,".
                      " ".$l_artist_recording->entity1." ,".
                      " ".$l_artist_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_recording->last_updated)."',".
                      " ".$l_artist_recording->link_order." ,".
                      "'".$this->sqlSafe($l_artist_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_recording->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_artist_recording into musicbrainz database
     * and return a L_artist_recording with new autoincrement
     * primary key
     *
     * @param  $l_artist_recording
     * @return $l_artist_recording
     *********************************************************
     */
    public function insert2($l_artist_recording)
    {
        $query="INSERT INTO l_artist_recording ( ".
	              "id,".
                      "link,".
                      "entity0,".
                      "entity1,".
                      "edits_pending,".
                      "last_updated,".
                      "link_order,".
                      "entity0_credit,".
                      "entity1_credit ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$l_artist_recording->link." ,".
                      " ".$l_artist_recording->entity0." ,".
                      " ".$l_artist_recording->entity1." ,".
                      " ".$l_artist_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_recording->last_updated)."',".
                      " ".$l_artist_recording->link_order." ,".
                      "'".$this->sqlSafe($l_artist_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_recording->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_artist_recording->id = $id;
	    return($l_artist_recording);	
    }


    /*********************************************************
     * Update a L_artist_recording in musicbrainz database
     *
     * @param $l_artist_recording
     * @return n/a
     *********************************************************
     */
    public function update($l_artist_recording)
    {
        $query="UPDATE  l_artist_recording ".
	          "SET ".
                      "id= ".$l_artist_recording->id." ,".
                      "link= ".$l_artist_recording->link." ,".
                      "entity0= ".$l_artist_recording->entity0." ,".
                      "entity1= ".$l_artist_recording->entity1." ,".
                      "edits_pending= ".$l_artist_recording->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_artist_recording->last_updated)."',".
                      "link_order= ".$l_artist_recording->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_artist_recording->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_artist_recording->entity1_credit)."' ".                      
	          "WHERE id=".$l_artist_recording->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_artist_recording by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_artist_recording WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>