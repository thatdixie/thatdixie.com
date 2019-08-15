<?php
require_once "MusicbrainzDB.php";
require      "L_event_place.php";

/********************************************************************
 * L_event_placeModel inherits MusicbrainzDB and provides functions to
 * map L_event_place class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_event_placeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_event_place by id
     *
     * @return l_event_place
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
	       "FROM l_event_place ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_event_place"));
    }

    /*********************************************************
     * Insert a new L_event_place into musicbrainz database
     *
     * @param $l_event_place
     * @return n/a
     *********************************************************
     */
    public function insert($l_event_place)
    {
        $query="INSERT INTO l_event_place ( ".
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
                      " ".$l_event_place->link." ,".
                      " ".$l_event_place->entity0." ,".
                      " ".$l_event_place->entity1." ,".
                      " ".$l_event_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_place->last_updated)."',".
                      " ".$l_event_place->link_order." ,".
                      "'".$this->sqlSafe($l_event_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_place->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_event_place into musicbrainz database
     * and return a L_event_place with new autoincrement
     * primary key
     *
     * @param  $l_event_place
     * @return $l_event_place
     *********************************************************
     */
    public function insert2($l_event_place)
    {
        $query="INSERT INTO l_event_place ( ".
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
                      " ".$l_event_place->link." ,".
                      " ".$l_event_place->entity0." ,".
                      " ".$l_event_place->entity1." ,".
                      " ".$l_event_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_place->last_updated)."',".
                      " ".$l_event_place->link_order." ,".
                      "'".$this->sqlSafe($l_event_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_place->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_event_place->id = $id;
	    return($l_event_place);	
    }


    /*********************************************************
     * Update a L_event_place in musicbrainz database
     *
     * @param $l_event_place
     * @return n/a
     *********************************************************
     */
    public function update($l_event_place)
    {
        $query="UPDATE  l_event_place ".
	          "SET ".
                      "id= ".$l_event_place->id." ,".
                      "link= ".$l_event_place->link." ,".
                      "entity0= ".$l_event_place->entity0." ,".
                      "entity1= ".$l_event_place->entity1." ,".
                      "edits_pending= ".$l_event_place->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_event_place->last_updated)."',".
                      "link_order= ".$l_event_place->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_event_place->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_event_place->entity1_credit)."' ".                      
	          "WHERE id=".$l_event_place->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_event_place by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_event_place WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>