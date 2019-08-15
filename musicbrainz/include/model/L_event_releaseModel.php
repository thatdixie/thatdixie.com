<?php
require_once "MusicbrainzDB.php";
require      "L_event_release.php";

/********************************************************************
 * L_event_releaseModel inherits MusicbrainzDB and provides functions to
 * map L_event_release class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_event_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_event_release by id
     *
     * @return l_event_release
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
	       "FROM l_event_release ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_event_release"));
    }

    /*********************************************************
     * Insert a new L_event_release into musicbrainz database
     *
     * @param $l_event_release
     * @return n/a
     *********************************************************
     */
    public function insert($l_event_release)
    {
        $query="INSERT INTO l_event_release ( ".
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
                      " ".$l_event_release->link." ,".
                      " ".$l_event_release->entity0." ,".
                      " ".$l_event_release->entity1." ,".
                      " ".$l_event_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_release->last_updated)."',".
                      " ".$l_event_release->link_order." ,".
                      "'".$this->sqlSafe($l_event_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_release->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_event_release into musicbrainz database
     * and return a L_event_release with new autoincrement
     * primary key
     *
     * @param  $l_event_release
     * @return $l_event_release
     *********************************************************
     */
    public function insert2($l_event_release)
    {
        $query="INSERT INTO l_event_release ( ".
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
                      " ".$l_event_release->link." ,".
                      " ".$l_event_release->entity0." ,".
                      " ".$l_event_release->entity1." ,".
                      " ".$l_event_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_release->last_updated)."',".
                      " ".$l_event_release->link_order." ,".
                      "'".$this->sqlSafe($l_event_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_release->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_event_release->id = $id;
	    return($l_event_release);	
    }


    /*********************************************************
     * Update a L_event_release in musicbrainz database
     *
     * @param $l_event_release
     * @return n/a
     *********************************************************
     */
    public function update($l_event_release)
    {
        $query="UPDATE  l_event_release ".
	          "SET ".
                      "id= ".$l_event_release->id." ,".
                      "link= ".$l_event_release->link." ,".
                      "entity0= ".$l_event_release->entity0." ,".
                      "entity1= ".$l_event_release->entity1." ,".
                      "edits_pending= ".$l_event_release->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_event_release->last_updated)."',".
                      "link_order= ".$l_event_release->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_event_release->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_event_release->entity1_credit)."' ".                      
	          "WHERE id=".$l_event_release->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_event_release by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_event_release WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>