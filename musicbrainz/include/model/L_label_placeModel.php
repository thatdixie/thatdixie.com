<?php
require_once "MusicbrainzDB.php";
require      "L_label_place.php";

/********************************************************************
 * L_label_placeModel inherits MusicbrainzDB and provides functions to
 * map L_label_place class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_label_placeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_label_place by id
     *
     * @return l_label_place
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
	       "FROM l_label_place ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_label_place"));
    }

    /*********************************************************
     * Insert a new L_label_place into musicbrainz database
     *
     * @param $l_label_place
     * @return n/a
     *********************************************************
     */
    public function insert($l_label_place)
    {
        $query="INSERT INTO l_label_place ( ".
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
                      " ".$l_label_place->link." ,".
                      " ".$l_label_place->entity0." ,".
                      " ".$l_label_place->entity1." ,".
                      " ".$l_label_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_place->last_updated)."',".
                      " ".$l_label_place->link_order." ,".
                      "'".$this->sqlSafe($l_label_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_place->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_label_place into musicbrainz database
     * and return a L_label_place with new autoincrement
     * primary key
     *
     * @param  $l_label_place
     * @return $l_label_place
     *********************************************************
     */
    public function insert2($l_label_place)
    {
        $query="INSERT INTO l_label_place ( ".
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
                      " ".$l_label_place->link." ,".
                      " ".$l_label_place->entity0." ,".
                      " ".$l_label_place->entity1." ,".
                      " ".$l_label_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_place->last_updated)."',".
                      " ".$l_label_place->link_order." ,".
                      "'".$this->sqlSafe($l_label_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_place->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_label_place->id = $id;
	    return($l_label_place);	
    }


    /*********************************************************
     * Update a L_label_place in musicbrainz database
     *
     * @param $l_label_place
     * @return n/a
     *********************************************************
     */
    public function update($l_label_place)
    {
        $query="UPDATE  l_label_place ".
	          "SET ".
                      "id= ".$l_label_place->id." ,".
                      "link= ".$l_label_place->link." ,".
                      "entity0= ".$l_label_place->entity0." ,".
                      "entity1= ".$l_label_place->entity1." ,".
                      "edits_pending= ".$l_label_place->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_label_place->last_updated)."',".
                      "link_order= ".$l_label_place->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_label_place->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_label_place->entity1_credit)."' ".                      
	          "WHERE id=".$l_label_place->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_label_place by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_label_place WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>