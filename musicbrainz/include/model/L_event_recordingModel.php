<?php
require_once "MusicbrainzDB.php";
require      "L_event_recording.php";

/********************************************************************
 * L_event_recordingModel inherits MusicbrainzDB and provides functions to
 * map L_event_recording class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_event_recordingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_event_recording by id
     *
     * @return l_event_recording
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
	       "FROM l_event_recording ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_event_recording"));
    }

    /*********************************************************
     * Insert a new L_event_recording into musicbrainz database
     *
     * @param $l_event_recording
     * @return n/a
     *********************************************************
     */
    public function insert($l_event_recording)
    {
        $query="INSERT INTO l_event_recording ( ".
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
                      " ".$l_event_recording->link." ,".
                      " ".$l_event_recording->entity0." ,".
                      " ".$l_event_recording->entity1." ,".
                      " ".$l_event_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_recording->last_updated)."',".
                      " ".$l_event_recording->link_order." ,".
                      "'".$this->sqlSafe($l_event_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_recording->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_event_recording into musicbrainz database
     * and return a L_event_recording with new autoincrement
     * primary key
     *
     * @param  $l_event_recording
     * @return $l_event_recording
     *********************************************************
     */
    public function insert2($l_event_recording)
    {
        $query="INSERT INTO l_event_recording ( ".
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
                      " ".$l_event_recording->link." ,".
                      " ".$l_event_recording->entity0." ,".
                      " ".$l_event_recording->entity1." ,".
                      " ".$l_event_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_recording->last_updated)."',".
                      " ".$l_event_recording->link_order." ,".
                      "'".$this->sqlSafe($l_event_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_recording->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_event_recording->id = $id;
	    return($l_event_recording);	
    }


    /*********************************************************
     * Update a L_event_recording in musicbrainz database
     *
     * @param $l_event_recording
     * @return n/a
     *********************************************************
     */
    public function update($l_event_recording)
    {
        $query="UPDATE  l_event_recording ".
	          "SET ".
                      "id= ".$l_event_recording->id." ,".
                      "link= ".$l_event_recording->link." ,".
                      "entity0= ".$l_event_recording->entity0." ,".
                      "entity1= ".$l_event_recording->entity1." ,".
                      "edits_pending= ".$l_event_recording->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_event_recording->last_updated)."',".
                      "link_order= ".$l_event_recording->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_event_recording->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_event_recording->entity1_credit)."' ".                      
	          "WHERE id=".$l_event_recording->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_event_recording by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_event_recording WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>