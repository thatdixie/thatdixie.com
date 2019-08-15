<?php
require_once "MusicbrainzDB.php";
require      "L_recording_work.php";

/********************************************************************
 * L_recording_workModel inherits MusicbrainzDB and provides functions to
 * map L_recording_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_recording_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_recording_work by id
     *
     * @return l_recording_work
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
	       "FROM l_recording_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_recording_work"));
    }

    /*********************************************************
     * Insert a new L_recording_work into musicbrainz database
     *
     * @param $l_recording_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_recording_work)
    {
        $query="INSERT INTO l_recording_work ( ".
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
                      " ".$l_recording_work->link." ,".
                      " ".$l_recording_work->entity0." ,".
                      " ".$l_recording_work->entity1." ,".
                      " ".$l_recording_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_recording_work->last_updated)."',".
                      " ".$l_recording_work->link_order." ,".
                      "'".$this->sqlSafe($l_recording_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_recording_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_recording_work into musicbrainz database
     * and return a L_recording_work with new autoincrement
     * primary key
     *
     * @param  $l_recording_work
     * @return $l_recording_work
     *********************************************************
     */
    public function insert2($l_recording_work)
    {
        $query="INSERT INTO l_recording_work ( ".
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
                      " ".$l_recording_work->link." ,".
                      " ".$l_recording_work->entity0." ,".
                      " ".$l_recording_work->entity1." ,".
                      " ".$l_recording_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_recording_work->last_updated)."',".
                      " ".$l_recording_work->link_order." ,".
                      "'".$this->sqlSafe($l_recording_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_recording_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_recording_work->id = $id;
	    return($l_recording_work);	
    }


    /*********************************************************
     * Update a L_recording_work in musicbrainz database
     *
     * @param $l_recording_work
     * @return n/a
     *********************************************************
     */
    public function update($l_recording_work)
    {
        $query="UPDATE  l_recording_work ".
	          "SET ".
                      "id= ".$l_recording_work->id." ,".
                      "link= ".$l_recording_work->link." ,".
                      "entity0= ".$l_recording_work->entity0." ,".
                      "entity1= ".$l_recording_work->entity1." ,".
                      "edits_pending= ".$l_recording_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_recording_work->last_updated)."',".
                      "link_order= ".$l_recording_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_recording_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_recording_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_recording_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_recording_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_recording_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>