<?php
require_once "MusicbrainzDB.php";
require      "L_event_work.php";

/********************************************************************
 * L_event_workModel inherits MusicbrainzDB and provides functions to
 * map L_event_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_event_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_event_work by id
     *
     * @return l_event_work
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
	       "FROM l_event_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_event_work"));
    }

    /*********************************************************
     * Insert a new L_event_work into musicbrainz database
     *
     * @param $l_event_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_event_work)
    {
        $query="INSERT INTO l_event_work ( ".
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
                      " ".$l_event_work->link." ,".
                      " ".$l_event_work->entity0." ,".
                      " ".$l_event_work->entity1." ,".
                      " ".$l_event_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_work->last_updated)."',".
                      " ".$l_event_work->link_order." ,".
                      "'".$this->sqlSafe($l_event_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_event_work into musicbrainz database
     * and return a L_event_work with new autoincrement
     * primary key
     *
     * @param  $l_event_work
     * @return $l_event_work
     *********************************************************
     */
    public function insert2($l_event_work)
    {
        $query="INSERT INTO l_event_work ( ".
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
                      " ".$l_event_work->link." ,".
                      " ".$l_event_work->entity0." ,".
                      " ".$l_event_work->entity1." ,".
                      " ".$l_event_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_work->last_updated)."',".
                      " ".$l_event_work->link_order." ,".
                      "'".$this->sqlSafe($l_event_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_event_work->id = $id;
	    return($l_event_work);	
    }


    /*********************************************************
     * Update a L_event_work in musicbrainz database
     *
     * @param $l_event_work
     * @return n/a
     *********************************************************
     */
    public function update($l_event_work)
    {
        $query="UPDATE  l_event_work ".
	          "SET ".
                      "id= ".$l_event_work->id." ,".
                      "link= ".$l_event_work->link." ,".
                      "entity0= ".$l_event_work->entity0." ,".
                      "entity1= ".$l_event_work->entity1." ,".
                      "edits_pending= ".$l_event_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_event_work->last_updated)."',".
                      "link_order= ".$l_event_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_event_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_event_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_event_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_event_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_event_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>