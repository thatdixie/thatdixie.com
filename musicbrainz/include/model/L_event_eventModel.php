<?php
require_once "MusicbrainzDB.php";
require      "L_event_event.php";

/********************************************************************
 * L_event_eventModel inherits MusicbrainzDB and provides functions to
 * map L_event_event class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_event_eventModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_event_event by id
     *
     * @return l_event_event
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
	       "FROM l_event_event ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_event_event"));
    }

    /*********************************************************
     * Insert a new L_event_event into musicbrainz database
     *
     * @param $l_event_event
     * @return n/a
     *********************************************************
     */
    public function insert($l_event_event)
    {
        $query="INSERT INTO l_event_event ( ".
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
                      " ".$l_event_event->link." ,".
                      " ".$l_event_event->entity0." ,".
                      " ".$l_event_event->entity1." ,".
                      " ".$l_event_event->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_event->last_updated)."',".
                      " ".$l_event_event->link_order." ,".
                      "'".$this->sqlSafe($l_event_event->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_event->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_event_event into musicbrainz database
     * and return a L_event_event with new autoincrement
     * primary key
     *
     * @param  $l_event_event
     * @return $l_event_event
     *********************************************************
     */
    public function insert2($l_event_event)
    {
        $query="INSERT INTO l_event_event ( ".
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
                      " ".$l_event_event->link." ,".
                      " ".$l_event_event->entity0." ,".
                      " ".$l_event_event->entity1." ,".
                      " ".$l_event_event->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_event->last_updated)."',".
                      " ".$l_event_event->link_order." ,".
                      "'".$this->sqlSafe($l_event_event->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_event->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_event_event->id = $id;
	    return($l_event_event);	
    }


    /*********************************************************
     * Update a L_event_event in musicbrainz database
     *
     * @param $l_event_event
     * @return n/a
     *********************************************************
     */
    public function update($l_event_event)
    {
        $query="UPDATE  l_event_event ".
	          "SET ".
                      "id= ".$l_event_event->id." ,".
                      "link= ".$l_event_event->link." ,".
                      "entity0= ".$l_event_event->entity0." ,".
                      "entity1= ".$l_event_event->entity1." ,".
                      "edits_pending= ".$l_event_event->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_event_event->last_updated)."',".
                      "link_order= ".$l_event_event->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_event_event->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_event_event->entity1_credit)."' ".                      
	          "WHERE id=".$l_event_event->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_event_event by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_event_event WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>