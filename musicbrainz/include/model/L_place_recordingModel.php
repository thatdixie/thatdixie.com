<?php
require_once "MusicbrainzDB.php";
require      "L_place_recording.php";

/********************************************************************
 * L_place_recordingModel inherits MusicbrainzDB and provides functions to
 * map L_place_recording class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_place_recordingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_place_recording by id
     *
     * @return l_place_recording
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
	       "FROM l_place_recording ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_place_recording"));
    }

    /*********************************************************
     * Insert a new L_place_recording into musicbrainz database
     *
     * @param $l_place_recording
     * @return n/a
     *********************************************************
     */
    public function insert($l_place_recording)
    {
        $query="INSERT INTO l_place_recording ( ".
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
                      " ".$l_place_recording->link." ,".
                      " ".$l_place_recording->entity0." ,".
                      " ".$l_place_recording->entity1." ,".
                      " ".$l_place_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_recording->last_updated)."',".
                      " ".$l_place_recording->link_order." ,".
                      "'".$this->sqlSafe($l_place_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_recording->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_place_recording into musicbrainz database
     * and return a L_place_recording with new autoincrement
     * primary key
     *
     * @param  $l_place_recording
     * @return $l_place_recording
     *********************************************************
     */
    public function insert2($l_place_recording)
    {
        $query="INSERT INTO l_place_recording ( ".
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
                      " ".$l_place_recording->link." ,".
                      " ".$l_place_recording->entity0." ,".
                      " ".$l_place_recording->entity1." ,".
                      " ".$l_place_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_recording->last_updated)."',".
                      " ".$l_place_recording->link_order." ,".
                      "'".$this->sqlSafe($l_place_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_recording->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_place_recording->id = $id;
	    return($l_place_recording);	
    }


    /*********************************************************
     * Update a L_place_recording in musicbrainz database
     *
     * @param $l_place_recording
     * @return n/a
     *********************************************************
     */
    public function update($l_place_recording)
    {
        $query="UPDATE  l_place_recording ".
	          "SET ".
                      "id= ".$l_place_recording->id." ,".
                      "link= ".$l_place_recording->link." ,".
                      "entity0= ".$l_place_recording->entity0." ,".
                      "entity1= ".$l_place_recording->entity1." ,".
                      "edits_pending= ".$l_place_recording->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_place_recording->last_updated)."',".
                      "link_order= ".$l_place_recording->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_place_recording->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_place_recording->entity1_credit)."' ".                      
	          "WHERE id=".$l_place_recording->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_place_recording by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_place_recording WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>