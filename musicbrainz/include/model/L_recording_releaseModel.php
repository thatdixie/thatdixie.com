<?php
require_once "MusicbrainzDB.php";
require      "L_recording_release.php";

/********************************************************************
 * L_recording_releaseModel inherits MusicbrainzDB and provides functions to
 * map L_recording_release class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_recording_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_recording_release by id
     *
     * @return l_recording_release
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
	       "FROM l_recording_release ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_recording_release"));
    }

    /*********************************************************
     * Insert a new L_recording_release into musicbrainz database
     *
     * @param $l_recording_release
     * @return n/a
     *********************************************************
     */
    public function insert($l_recording_release)
    {
        $query="INSERT INTO l_recording_release ( ".
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
                      " ".$l_recording_release->link." ,".
                      " ".$l_recording_release->entity0." ,".
                      " ".$l_recording_release->entity1." ,".
                      " ".$l_recording_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_recording_release->last_updated)."',".
                      " ".$l_recording_release->link_order." ,".
                      "'".$this->sqlSafe($l_recording_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_recording_release->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_recording_release into musicbrainz database
     * and return a L_recording_release with new autoincrement
     * primary key
     *
     * @param  $l_recording_release
     * @return $l_recording_release
     *********************************************************
     */
    public function insert2($l_recording_release)
    {
        $query="INSERT INTO l_recording_release ( ".
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
                      " ".$l_recording_release->link." ,".
                      " ".$l_recording_release->entity0." ,".
                      " ".$l_recording_release->entity1." ,".
                      " ".$l_recording_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_recording_release->last_updated)."',".
                      " ".$l_recording_release->link_order." ,".
                      "'".$this->sqlSafe($l_recording_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_recording_release->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_recording_release->id = $id;
	    return($l_recording_release);	
    }


    /*********************************************************
     * Update a L_recording_release in musicbrainz database
     *
     * @param $l_recording_release
     * @return n/a
     *********************************************************
     */
    public function update($l_recording_release)
    {
        $query="UPDATE  l_recording_release ".
	          "SET ".
                      "id= ".$l_recording_release->id." ,".
                      "link= ".$l_recording_release->link." ,".
                      "entity0= ".$l_recording_release->entity0." ,".
                      "entity1= ".$l_recording_release->entity1." ,".
                      "edits_pending= ".$l_recording_release->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_recording_release->last_updated)."',".
                      "link_order= ".$l_recording_release->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_recording_release->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_recording_release->entity1_credit)."' ".                      
	          "WHERE id=".$l_recording_release->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_recording_release by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_recording_release WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>