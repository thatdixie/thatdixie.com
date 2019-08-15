<?php
require_once "MusicbrainzDB.php";
require      "L_instrument_place.php";

/********************************************************************
 * L_instrument_placeModel inherits MusicbrainzDB and provides functions to
 * map L_instrument_place class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_instrument_placeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_instrument_place by id
     *
     * @return l_instrument_place
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
	       "FROM l_instrument_place ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_instrument_place"));
    }

    /*********************************************************
     * Insert a new L_instrument_place into musicbrainz database
     *
     * @param $l_instrument_place
     * @return n/a
     *********************************************************
     */
    public function insert($l_instrument_place)
    {
        $query="INSERT INTO l_instrument_place ( ".
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
                      " ".$l_instrument_place->link." ,".
                      " ".$l_instrument_place->entity0." ,".
                      " ".$l_instrument_place->entity1." ,".
                      " ".$l_instrument_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_place->last_updated)."',".
                      " ".$l_instrument_place->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_place->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_instrument_place into musicbrainz database
     * and return a L_instrument_place with new autoincrement
     * primary key
     *
     * @param  $l_instrument_place
     * @return $l_instrument_place
     *********************************************************
     */
    public function insert2($l_instrument_place)
    {
        $query="INSERT INTO l_instrument_place ( ".
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
                      " ".$l_instrument_place->link." ,".
                      " ".$l_instrument_place->entity0." ,".
                      " ".$l_instrument_place->entity1." ,".
                      " ".$l_instrument_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_place->last_updated)."',".
                      " ".$l_instrument_place->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_place->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_instrument_place->id = $id;
	    return($l_instrument_place);	
    }


    /*********************************************************
     * Update a L_instrument_place in musicbrainz database
     *
     * @param $l_instrument_place
     * @return n/a
     *********************************************************
     */
    public function update($l_instrument_place)
    {
        $query="UPDATE  l_instrument_place ".
	          "SET ".
                      "id= ".$l_instrument_place->id." ,".
                      "link= ".$l_instrument_place->link." ,".
                      "entity0= ".$l_instrument_place->entity0." ,".
                      "entity1= ".$l_instrument_place->entity1." ,".
                      "edits_pending= ".$l_instrument_place->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_instrument_place->last_updated)."',".
                      "link_order= ".$l_instrument_place->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_instrument_place->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_instrument_place->entity1_credit)."' ".                      
	          "WHERE id=".$l_instrument_place->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_instrument_place by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_instrument_place WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>