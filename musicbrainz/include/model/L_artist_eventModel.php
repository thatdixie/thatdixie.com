<?php
require_once "MusicbrainzDB.php";
require      "L_artist_event.php";

/********************************************************************
 * L_artist_eventModel inherits MusicbrainzDB and provides functions to
 * map L_artist_event class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_artist_eventModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_artist_event by id
     *
     * @return l_artist_event
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
	       "FROM l_artist_event ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_artist_event"));
    }

    /*********************************************************
     * Insert a new L_artist_event into musicbrainz database
     *
     * @param $l_artist_event
     * @return n/a
     *********************************************************
     */
    public function insert($l_artist_event)
    {
        $query="INSERT INTO l_artist_event ( ".
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
                      " ".$l_artist_event->link." ,".
                      " ".$l_artist_event->entity0." ,".
                      " ".$l_artist_event->entity1." ,".
                      " ".$l_artist_event->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_event->last_updated)."',".
                      " ".$l_artist_event->link_order." ,".
                      "'".$this->sqlSafe($l_artist_event->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_event->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_artist_event into musicbrainz database
     * and return a L_artist_event with new autoincrement
     * primary key
     *
     * @param  $l_artist_event
     * @return $l_artist_event
     *********************************************************
     */
    public function insert2($l_artist_event)
    {
        $query="INSERT INTO l_artist_event ( ".
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
                      " ".$l_artist_event->link." ,".
                      " ".$l_artist_event->entity0." ,".
                      " ".$l_artist_event->entity1." ,".
                      " ".$l_artist_event->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_event->last_updated)."',".
                      " ".$l_artist_event->link_order." ,".
                      "'".$this->sqlSafe($l_artist_event->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_event->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_artist_event->id = $id;
	    return($l_artist_event);	
    }


    /*********************************************************
     * Update a L_artist_event in musicbrainz database
     *
     * @param $l_artist_event
     * @return n/a
     *********************************************************
     */
    public function update($l_artist_event)
    {
        $query="UPDATE  l_artist_event ".
	          "SET ".
                      "id= ".$l_artist_event->id." ,".
                      "link= ".$l_artist_event->link." ,".
                      "entity0= ".$l_artist_event->entity0." ,".
                      "entity1= ".$l_artist_event->entity1." ,".
                      "edits_pending= ".$l_artist_event->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_artist_event->last_updated)."',".
                      "link_order= ".$l_artist_event->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_artist_event->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_artist_event->entity1_credit)."' ".                      
	          "WHERE id=".$l_artist_event->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_artist_event by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_artist_event WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>