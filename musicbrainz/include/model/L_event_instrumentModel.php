<?php
require_once "MusicbrainzDB.php";
require      "L_event_instrument.php";

/********************************************************************
 * L_event_instrumentModel inherits MusicbrainzDB and provides functions to
 * map L_event_instrument class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_event_instrumentModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_event_instrument by id
     *
     * @return l_event_instrument
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
	       "FROM l_event_instrument ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_event_instrument"));
    }

    /*********************************************************
     * Insert a new L_event_instrument into musicbrainz database
     *
     * @param $l_event_instrument
     * @return n/a
     *********************************************************
     */
    public function insert($l_event_instrument)
    {
        $query="INSERT INTO l_event_instrument ( ".
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
                      " ".$l_event_instrument->link." ,".
                      " ".$l_event_instrument->entity0." ,".
                      " ".$l_event_instrument->entity1." ,".
                      " ".$l_event_instrument->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_instrument->last_updated)."',".
                      " ".$l_event_instrument->link_order." ,".
                      "'".$this->sqlSafe($l_event_instrument->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_instrument->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_event_instrument into musicbrainz database
     * and return a L_event_instrument with new autoincrement
     * primary key
     *
     * @param  $l_event_instrument
     * @return $l_event_instrument
     *********************************************************
     */
    public function insert2($l_event_instrument)
    {
        $query="INSERT INTO l_event_instrument ( ".
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
                      " ".$l_event_instrument->link." ,".
                      " ".$l_event_instrument->entity0." ,".
                      " ".$l_event_instrument->entity1." ,".
                      " ".$l_event_instrument->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_instrument->last_updated)."',".
                      " ".$l_event_instrument->link_order." ,".
                      "'".$this->sqlSafe($l_event_instrument->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_instrument->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_event_instrument->id = $id;
	    return($l_event_instrument);	
    }


    /*********************************************************
     * Update a L_event_instrument in musicbrainz database
     *
     * @param $l_event_instrument
     * @return n/a
     *********************************************************
     */
    public function update($l_event_instrument)
    {
        $query="UPDATE  l_event_instrument ".
	          "SET ".
                      "id= ".$l_event_instrument->id." ,".
                      "link= ".$l_event_instrument->link." ,".
                      "entity0= ".$l_event_instrument->entity0." ,".
                      "entity1= ".$l_event_instrument->entity1." ,".
                      "edits_pending= ".$l_event_instrument->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_event_instrument->last_updated)."',".
                      "link_order= ".$l_event_instrument->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_event_instrument->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_event_instrument->entity1_credit)."' ".                      
	          "WHERE id=".$l_event_instrument->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_event_instrument by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_event_instrument WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>