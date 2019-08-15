<?php
require_once "MusicbrainzDB.php";
require      "L_instrument_recording.php";

/********************************************************************
 * L_instrument_recordingModel inherits MusicbrainzDB and provides functions to
 * map L_instrument_recording class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_instrument_recordingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_instrument_recording by id
     *
     * @return l_instrument_recording
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
	       "FROM l_instrument_recording ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_instrument_recording"));
    }

    /*********************************************************
     * Insert a new L_instrument_recording into musicbrainz database
     *
     * @param $l_instrument_recording
     * @return n/a
     *********************************************************
     */
    public function insert($l_instrument_recording)
    {
        $query="INSERT INTO l_instrument_recording ( ".
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
                      " ".$l_instrument_recording->link." ,".
                      " ".$l_instrument_recording->entity0." ,".
                      " ".$l_instrument_recording->entity1." ,".
                      " ".$l_instrument_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_recording->last_updated)."',".
                      " ".$l_instrument_recording->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_recording->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_instrument_recording into musicbrainz database
     * and return a L_instrument_recording with new autoincrement
     * primary key
     *
     * @param  $l_instrument_recording
     * @return $l_instrument_recording
     *********************************************************
     */
    public function insert2($l_instrument_recording)
    {
        $query="INSERT INTO l_instrument_recording ( ".
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
                      " ".$l_instrument_recording->link." ,".
                      " ".$l_instrument_recording->entity0." ,".
                      " ".$l_instrument_recording->entity1." ,".
                      " ".$l_instrument_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_recording->last_updated)."',".
                      " ".$l_instrument_recording->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_recording->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_instrument_recording->id = $id;
	    return($l_instrument_recording);	
    }


    /*********************************************************
     * Update a L_instrument_recording in musicbrainz database
     *
     * @param $l_instrument_recording
     * @return n/a
     *********************************************************
     */
    public function update($l_instrument_recording)
    {
        $query="UPDATE  l_instrument_recording ".
	          "SET ".
                      "id= ".$l_instrument_recording->id." ,".
                      "link= ".$l_instrument_recording->link." ,".
                      "entity0= ".$l_instrument_recording->entity0." ,".
                      "entity1= ".$l_instrument_recording->entity1." ,".
                      "edits_pending= ".$l_instrument_recording->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_instrument_recording->last_updated)."',".
                      "link_order= ".$l_instrument_recording->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_instrument_recording->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_instrument_recording->entity1_credit)."' ".                      
	          "WHERE id=".$l_instrument_recording->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_instrument_recording by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_instrument_recording WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>