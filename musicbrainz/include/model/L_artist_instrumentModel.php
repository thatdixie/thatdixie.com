<?php
require_once "MusicbrainzDB.php";
require      "L_artist_instrument.php";

/********************************************************************
 * L_artist_instrumentModel inherits MusicbrainzDB and provides functions to
 * map L_artist_instrument class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_artist_instrumentModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_artist_instrument by id
     *
     * @return l_artist_instrument
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
	       "FROM l_artist_instrument ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_artist_instrument"));
    }

    /*********************************************************
     * Insert a new L_artist_instrument into musicbrainz database
     *
     * @param $l_artist_instrument
     * @return n/a
     *********************************************************
     */
    public function insert($l_artist_instrument)
    {
        $query="INSERT INTO l_artist_instrument ( ".
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
                      " ".$l_artist_instrument->link." ,".
                      " ".$l_artist_instrument->entity0." ,".
                      " ".$l_artist_instrument->entity1." ,".
                      " ".$l_artist_instrument->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_instrument->last_updated)."',".
                      " ".$l_artist_instrument->link_order." ,".
                      "'".$this->sqlSafe($l_artist_instrument->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_instrument->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_artist_instrument into musicbrainz database
     * and return a L_artist_instrument with new autoincrement
     * primary key
     *
     * @param  $l_artist_instrument
     * @return $l_artist_instrument
     *********************************************************
     */
    public function insert2($l_artist_instrument)
    {
        $query="INSERT INTO l_artist_instrument ( ".
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
                      " ".$l_artist_instrument->link." ,".
                      " ".$l_artist_instrument->entity0." ,".
                      " ".$l_artist_instrument->entity1." ,".
                      " ".$l_artist_instrument->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_instrument->last_updated)."',".
                      " ".$l_artist_instrument->link_order." ,".
                      "'".$this->sqlSafe($l_artist_instrument->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_instrument->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_artist_instrument->id = $id;
	    return($l_artist_instrument);	
    }


    /*********************************************************
     * Update a L_artist_instrument in musicbrainz database
     *
     * @param $l_artist_instrument
     * @return n/a
     *********************************************************
     */
    public function update($l_artist_instrument)
    {
        $query="UPDATE  l_artist_instrument ".
	          "SET ".
                      "id= ".$l_artist_instrument->id." ,".
                      "link= ".$l_artist_instrument->link." ,".
                      "entity0= ".$l_artist_instrument->entity0." ,".
                      "entity1= ".$l_artist_instrument->entity1." ,".
                      "edits_pending= ".$l_artist_instrument->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_artist_instrument->last_updated)."',".
                      "link_order= ".$l_artist_instrument->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_artist_instrument->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_artist_instrument->entity1_credit)."' ".                      
	          "WHERE id=".$l_artist_instrument->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_artist_instrument by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_artist_instrument WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>