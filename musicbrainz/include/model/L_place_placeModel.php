<?php
require_once "MusicbrainzDB.php";
require      "L_place_place.php";

/********************************************************************
 * L_place_placeModel inherits MusicbrainzDB and provides functions to
 * map L_place_place class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_place_placeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_place_place by id
     *
     * @return l_place_place
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
	       "FROM l_place_place ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_place_place"));
    }

    /*********************************************************
     * Insert a new L_place_place into musicbrainz database
     *
     * @param $l_place_place
     * @return n/a
     *********************************************************
     */
    public function insert($l_place_place)
    {
        $query="INSERT INTO l_place_place ( ".
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
                      " ".$l_place_place->link." ,".
                      " ".$l_place_place->entity0." ,".
                      " ".$l_place_place->entity1." ,".
                      " ".$l_place_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_place->last_updated)."',".
                      " ".$l_place_place->link_order." ,".
                      "'".$this->sqlSafe($l_place_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_place->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_place_place into musicbrainz database
     * and return a L_place_place with new autoincrement
     * primary key
     *
     * @param  $l_place_place
     * @return $l_place_place
     *********************************************************
     */
    public function insert2($l_place_place)
    {
        $query="INSERT INTO l_place_place ( ".
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
                      " ".$l_place_place->link." ,".
                      " ".$l_place_place->entity0." ,".
                      " ".$l_place_place->entity1." ,".
                      " ".$l_place_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_place->last_updated)."',".
                      " ".$l_place_place->link_order." ,".
                      "'".$this->sqlSafe($l_place_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_place->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_place_place->id = $id;
	    return($l_place_place);	
    }


    /*********************************************************
     * Update a L_place_place in musicbrainz database
     *
     * @param $l_place_place
     * @return n/a
     *********************************************************
     */
    public function update($l_place_place)
    {
        $query="UPDATE  l_place_place ".
	          "SET ".
                      "id= ".$l_place_place->id." ,".
                      "link= ".$l_place_place->link." ,".
                      "entity0= ".$l_place_place->entity0." ,".
                      "entity1= ".$l_place_place->entity1." ,".
                      "edits_pending= ".$l_place_place->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_place_place->last_updated)."',".
                      "link_order= ".$l_place_place->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_place_place->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_place_place->entity1_credit)."' ".                      
	          "WHERE id=".$l_place_place->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_place_place by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_place_place WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>