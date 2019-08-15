<?php
require_once "MusicbrainzDB.php";
require      "L_area_instrument.php";

/********************************************************************
 * L_area_instrumentModel inherits MusicbrainzDB and provides functions to
 * map L_area_instrument class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_instrumentModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_instrument by id
     *
     * @return l_area_instrument
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
	       "FROM l_area_instrument ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_instrument"));
    }

    /*********************************************************
     * Insert a new L_area_instrument into musicbrainz database
     *
     * @param $l_area_instrument
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_instrument)
    {
        $query="INSERT INTO l_area_instrument ( ".
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
                      " ".$l_area_instrument->link." ,".
                      " ".$l_area_instrument->entity0." ,".
                      " ".$l_area_instrument->entity1." ,".
                      " ".$l_area_instrument->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_instrument->last_updated)."',".
                      " ".$l_area_instrument->link_order." ,".
                      "'".$this->sqlSafe($l_area_instrument->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_instrument->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_instrument into musicbrainz database
     * and return a L_area_instrument with new autoincrement
     * primary key
     *
     * @param  $l_area_instrument
     * @return $l_area_instrument
     *********************************************************
     */
    public function insert2($l_area_instrument)
    {
        $query="INSERT INTO l_area_instrument ( ".
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
                      " ".$l_area_instrument->link." ,".
                      " ".$l_area_instrument->entity0." ,".
                      " ".$l_area_instrument->entity1." ,".
                      " ".$l_area_instrument->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_instrument->last_updated)."',".
                      " ".$l_area_instrument->link_order." ,".
                      "'".$this->sqlSafe($l_area_instrument->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_instrument->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_instrument->id = $id;
	    return($l_area_instrument);	
    }


    /*********************************************************
     * Update a L_area_instrument in musicbrainz database
     *
     * @param $l_area_instrument
     * @return n/a
     *********************************************************
     */
    public function update($l_area_instrument)
    {
        $query="UPDATE  l_area_instrument ".
	          "SET ".
                      "id= ".$l_area_instrument->id." ,".
                      "link= ".$l_area_instrument->link." ,".
                      "entity0= ".$l_area_instrument->entity0." ,".
                      "entity1= ".$l_area_instrument->entity1." ,".
                      "edits_pending= ".$l_area_instrument->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_instrument->last_updated)."',".
                      "link_order= ".$l_area_instrument->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_instrument->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_instrument->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_instrument->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_instrument by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_instrument WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>