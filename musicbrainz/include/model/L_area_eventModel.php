<?php
require_once "MusicbrainzDB.php";
require      "L_area_event.php";

/********************************************************************
 * L_area_eventModel inherits MusicbrainzDB and provides functions to
 * map L_area_event class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_eventModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_event by id
     *
     * @return l_area_event
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
	       "FROM l_area_event ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_event"));
    }

    /*********************************************************
     * Insert a new L_area_event into musicbrainz database
     *
     * @param $l_area_event
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_event)
    {
        $query="INSERT INTO l_area_event ( ".
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
                      " ".$l_area_event->link." ,".
                      " ".$l_area_event->entity0." ,".
                      " ".$l_area_event->entity1." ,".
                      " ".$l_area_event->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_event->last_updated)."',".
                      " ".$l_area_event->link_order." ,".
                      "'".$this->sqlSafe($l_area_event->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_event->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_event into musicbrainz database
     * and return a L_area_event with new autoincrement
     * primary key
     *
     * @param  $l_area_event
     * @return $l_area_event
     *********************************************************
     */
    public function insert2($l_area_event)
    {
        $query="INSERT INTO l_area_event ( ".
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
                      " ".$l_area_event->link." ,".
                      " ".$l_area_event->entity0." ,".
                      " ".$l_area_event->entity1." ,".
                      " ".$l_area_event->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_event->last_updated)."',".
                      " ".$l_area_event->link_order." ,".
                      "'".$this->sqlSafe($l_area_event->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_event->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_event->id = $id;
	    return($l_area_event);	
    }


    /*********************************************************
     * Update a L_area_event in musicbrainz database
     *
     * @param $l_area_event
     * @return n/a
     *********************************************************
     */
    public function update($l_area_event)
    {
        $query="UPDATE  l_area_event ".
	          "SET ".
                      "id= ".$l_area_event->id." ,".
                      "link= ".$l_area_event->link." ,".
                      "entity0= ".$l_area_event->entity0." ,".
                      "entity1= ".$l_area_event->entity1." ,".
                      "edits_pending= ".$l_area_event->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_event->last_updated)."',".
                      "link_order= ".$l_area_event->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_event->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_event->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_event->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_event by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_event WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>