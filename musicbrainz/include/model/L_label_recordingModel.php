<?php
require_once "MusicbrainzDB.php";
require      "L_label_recording.php";

/********************************************************************
 * L_label_recordingModel inherits MusicbrainzDB and provides functions to
 * map L_label_recording class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_label_recordingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_label_recording by id
     *
     * @return l_label_recording
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
	       "FROM l_label_recording ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_label_recording"));
    }

    /*********************************************************
     * Insert a new L_label_recording into musicbrainz database
     *
     * @param $l_label_recording
     * @return n/a
     *********************************************************
     */
    public function insert($l_label_recording)
    {
        $query="INSERT INTO l_label_recording ( ".
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
                      " ".$l_label_recording->link." ,".
                      " ".$l_label_recording->entity0." ,".
                      " ".$l_label_recording->entity1." ,".
                      " ".$l_label_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_recording->last_updated)."',".
                      " ".$l_label_recording->link_order." ,".
                      "'".$this->sqlSafe($l_label_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_recording->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_label_recording into musicbrainz database
     * and return a L_label_recording with new autoincrement
     * primary key
     *
     * @param  $l_label_recording
     * @return $l_label_recording
     *********************************************************
     */
    public function insert2($l_label_recording)
    {
        $query="INSERT INTO l_label_recording ( ".
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
                      " ".$l_label_recording->link." ,".
                      " ".$l_label_recording->entity0." ,".
                      " ".$l_label_recording->entity1." ,".
                      " ".$l_label_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_recording->last_updated)."',".
                      " ".$l_label_recording->link_order." ,".
                      "'".$this->sqlSafe($l_label_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_recording->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_label_recording->id = $id;
	    return($l_label_recording);	
    }


    /*********************************************************
     * Update a L_label_recording in musicbrainz database
     *
     * @param $l_label_recording
     * @return n/a
     *********************************************************
     */
    public function update($l_label_recording)
    {
        $query="UPDATE  l_label_recording ".
	          "SET ".
                      "id= ".$l_label_recording->id." ,".
                      "link= ".$l_label_recording->link." ,".
                      "entity0= ".$l_label_recording->entity0." ,".
                      "entity1= ".$l_label_recording->entity1." ,".
                      "edits_pending= ".$l_label_recording->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_label_recording->last_updated)."',".
                      "link_order= ".$l_label_recording->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_label_recording->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_label_recording->entity1_credit)."' ".                      
	          "WHERE id=".$l_label_recording->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_label_recording by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_label_recording WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>