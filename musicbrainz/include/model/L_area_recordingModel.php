<?php
require_once "MusicbrainzDB.php";
require      "L_area_recording.php";

/********************************************************************
 * L_area_recordingModel inherits MusicbrainzDB and provides functions to
 * map L_area_recording class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_recordingModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_recording by id
     *
     * @return l_area_recording
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
	       "FROM l_area_recording ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_recording"));
    }

    /*********************************************************
     * Insert a new L_area_recording into musicbrainz database
     *
     * @param $l_area_recording
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_recording)
    {
        $query="INSERT INTO l_area_recording ( ".
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
                      " ".$l_area_recording->link." ,".
                      " ".$l_area_recording->entity0." ,".
                      " ".$l_area_recording->entity1." ,".
                      " ".$l_area_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_recording->last_updated)."',".
                      " ".$l_area_recording->link_order." ,".
                      "'".$this->sqlSafe($l_area_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_recording->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_recording into musicbrainz database
     * and return a L_area_recording with new autoincrement
     * primary key
     *
     * @param  $l_area_recording
     * @return $l_area_recording
     *********************************************************
     */
    public function insert2($l_area_recording)
    {
        $query="INSERT INTO l_area_recording ( ".
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
                      " ".$l_area_recording->link." ,".
                      " ".$l_area_recording->entity0." ,".
                      " ".$l_area_recording->entity1." ,".
                      " ".$l_area_recording->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_recording->last_updated)."',".
                      " ".$l_area_recording->link_order." ,".
                      "'".$this->sqlSafe($l_area_recording->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_recording->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_recording->id = $id;
	    return($l_area_recording);	
    }


    /*********************************************************
     * Update a L_area_recording in musicbrainz database
     *
     * @param $l_area_recording
     * @return n/a
     *********************************************************
     */
    public function update($l_area_recording)
    {
        $query="UPDATE  l_area_recording ".
	          "SET ".
                      "id= ".$l_area_recording->id." ,".
                      "link= ".$l_area_recording->link." ,".
                      "entity0= ".$l_area_recording->entity0." ,".
                      "entity1= ".$l_area_recording->entity1." ,".
                      "edits_pending= ".$l_area_recording->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_recording->last_updated)."',".
                      "link_order= ".$l_area_recording->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_recording->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_recording->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_recording->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_recording by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_recording WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>