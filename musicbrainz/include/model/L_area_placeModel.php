<?php
require_once "MusicbrainzDB.php";
require      "L_area_place.php";

/********************************************************************
 * L_area_placeModel inherits MusicbrainzDB and provides functions to
 * map L_area_place class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_placeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_place by id
     *
     * @return l_area_place
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
	       "FROM l_area_place ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_place"));
    }

    /*********************************************************
     * Insert a new L_area_place into musicbrainz database
     *
     * @param $l_area_place
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_place)
    {
        $query="INSERT INTO l_area_place ( ".
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
                      " ".$l_area_place->link." ,".
                      " ".$l_area_place->entity0." ,".
                      " ".$l_area_place->entity1." ,".
                      " ".$l_area_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_place->last_updated)."',".
                      " ".$l_area_place->link_order." ,".
                      "'".$this->sqlSafe($l_area_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_place->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_place into musicbrainz database
     * and return a L_area_place with new autoincrement
     * primary key
     *
     * @param  $l_area_place
     * @return $l_area_place
     *********************************************************
     */
    public function insert2($l_area_place)
    {
        $query="INSERT INTO l_area_place ( ".
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
                      " ".$l_area_place->link." ,".
                      " ".$l_area_place->entity0." ,".
                      " ".$l_area_place->entity1." ,".
                      " ".$l_area_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_place->last_updated)."',".
                      " ".$l_area_place->link_order." ,".
                      "'".$this->sqlSafe($l_area_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_place->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_place->id = $id;
	    return($l_area_place);	
    }


    /*********************************************************
     * Update a L_area_place in musicbrainz database
     *
     * @param $l_area_place
     * @return n/a
     *********************************************************
     */
    public function update($l_area_place)
    {
        $query="UPDATE  l_area_place ".
	          "SET ".
                      "id= ".$l_area_place->id." ,".
                      "link= ".$l_area_place->link." ,".
                      "entity0= ".$l_area_place->entity0." ,".
                      "entity1= ".$l_area_place->entity1." ,".
                      "edits_pending= ".$l_area_place->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_place->last_updated)."',".
                      "link_order= ".$l_area_place->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_place->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_place->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_place->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_place by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_place WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>