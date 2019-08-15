<?php
require_once "MusicbrainzDB.php";
require      "L_instrument_instrument.php";

/********************************************************************
 * L_instrument_instrumentModel inherits MusicbrainzDB and provides functions to
 * map L_instrument_instrument class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_instrument_instrumentModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_instrument_instrument by id
     *
     * @return l_instrument_instrument
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
	       "FROM l_instrument_instrument ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_instrument_instrument"));
    }

    /*********************************************************
     * Insert a new L_instrument_instrument into musicbrainz database
     *
     * @param $l_instrument_instrument
     * @return n/a
     *********************************************************
     */
    public function insert($l_instrument_instrument)
    {
        $query="INSERT INTO l_instrument_instrument ( ".
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
                      " ".$l_instrument_instrument->link." ,".
                      " ".$l_instrument_instrument->entity0." ,".
                      " ".$l_instrument_instrument->entity1." ,".
                      " ".$l_instrument_instrument->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_instrument->last_updated)."',".
                      " ".$l_instrument_instrument->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_instrument->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_instrument->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_instrument_instrument into musicbrainz database
     * and return a L_instrument_instrument with new autoincrement
     * primary key
     *
     * @param  $l_instrument_instrument
     * @return $l_instrument_instrument
     *********************************************************
     */
    public function insert2($l_instrument_instrument)
    {
        $query="INSERT INTO l_instrument_instrument ( ".
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
                      " ".$l_instrument_instrument->link." ,".
                      " ".$l_instrument_instrument->entity0." ,".
                      " ".$l_instrument_instrument->entity1." ,".
                      " ".$l_instrument_instrument->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_instrument->last_updated)."',".
                      " ".$l_instrument_instrument->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_instrument->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_instrument->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_instrument_instrument->id = $id;
	    return($l_instrument_instrument);	
    }


    /*********************************************************
     * Update a L_instrument_instrument in musicbrainz database
     *
     * @param $l_instrument_instrument
     * @return n/a
     *********************************************************
     */
    public function update($l_instrument_instrument)
    {
        $query="UPDATE  l_instrument_instrument ".
	          "SET ".
                      "id= ".$l_instrument_instrument->id." ,".
                      "link= ".$l_instrument_instrument->link." ,".
                      "entity0= ".$l_instrument_instrument->entity0." ,".
                      "entity1= ".$l_instrument_instrument->entity1." ,".
                      "edits_pending= ".$l_instrument_instrument->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_instrument_instrument->last_updated)."',".
                      "link_order= ".$l_instrument_instrument->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_instrument_instrument->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_instrument_instrument->entity1_credit)."' ".                      
	          "WHERE id=".$l_instrument_instrument->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_instrument_instrument by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_instrument_instrument WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>