<?php
require_once "MusicbrainzDB.php";
require      "L_recording_recording.php";

/********************************************************************
 * L_recording_recordingModel inherits MusicbrainzDB and provides functions to
 * map L_recording_recording class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_recording_recordingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_recording_recording by id
     *
     * @return l_recording_recording
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
	       "FROM l_recording_recording ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_recording_recording"));
    }

    /*********************************************************
     * Insert a new L_recording_recording into musicbrainz database
     *
     * @param $l_recording_recording
     * @return n/a
     *********************************************************
     */
    public function insert($l_recording_recording)
    {
        $query="INSERT INTO l_recording_recording ( ".
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
                      " ".$l_recording_recording->link." ,".
                      " ".$l_recording_recording->entity0." ,".
                      " ".$l_recording_recording->entity1." ,".
                      " ".$l_recording_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_recording_recording->last_updated)."',".
                      " ".$l_recording_recording->link_order." ,".
                      "'".$this->sqlSafe($l_recording_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_recording_recording->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_recording_recording into musicbrainz database
     * and return a L_recording_recording with new autoincrement
     * primary key
     *
     * @param  $l_recording_recording
     * @return $l_recording_recording
     *********************************************************
     */
    public function insert2($l_recording_recording)
    {
        $query="INSERT INTO l_recording_recording ( ".
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
                      " ".$l_recording_recording->link." ,".
                      " ".$l_recording_recording->entity0." ,".
                      " ".$l_recording_recording->entity1." ,".
                      " ".$l_recording_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_recording_recording->last_updated)."',".
                      " ".$l_recording_recording->link_order." ,".
                      "'".$this->sqlSafe($l_recording_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_recording_recording->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_recording_recording->id = $id;
	    return($l_recording_recording);	
    }


    /*********************************************************
     * Update a L_recording_recording in musicbrainz database
     *
     * @param $l_recording_recording
     * @return n/a
     *********************************************************
     */
    public function update($l_recording_recording)
    {
        $query="UPDATE  l_recording_recording ".
	          "SET ".
                      "id= ".$l_recording_recording->id." ,".
                      "link= ".$l_recording_recording->link." ,".
                      "entity0= ".$l_recording_recording->entity0." ,".
                      "entity1= ".$l_recording_recording->entity1." ,".
                      "edits_pending= ".$l_recording_recording->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_recording_recording->last_updated)."',".
                      "link_order= ".$l_recording_recording->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_recording_recording->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_recording_recording->entity1_credit)."' ".                      
	          "WHERE id=".$l_recording_recording->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_recording_recording by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_recording_recording WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>