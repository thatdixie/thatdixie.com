<?php
require_once "MusicbrainzDB.php";
require      "L_artist_place.php";

/********************************************************************
 * L_artist_placeModel inherits MusicbrainzDB and provides functions to
 * map L_artist_place class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_artist_placeModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_artist_place by id
     *
     * @return l_artist_place
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
	       "FROM l_artist_place ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_artist_place"));
    }

    /*********************************************************
     * Insert a new L_artist_place into musicbrainz database
     *
     * @param $l_artist_place
     * @return n/a
     *********************************************************
     */
    public function insert($l_artist_place)
    {
        $query="INSERT INTO l_artist_place ( ".
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
                      " ".$l_artist_place->link." ,".
                      " ".$l_artist_place->entity0." ,".
                      " ".$l_artist_place->entity1." ,".
                      " ".$l_artist_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_place->last_updated)."',".
                      " ".$l_artist_place->link_order." ,".
                      "'".$this->sqlSafe($l_artist_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_place->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_artist_place into musicbrainz database
     * and return a L_artist_place with new autoincrement
     * primary key
     *
     * @param  $l_artist_place
     * @return $l_artist_place
     *********************************************************
     */
    public function insert2($l_artist_place)
    {
        $query="INSERT INTO l_artist_place ( ".
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
                      " ".$l_artist_place->link." ,".
                      " ".$l_artist_place->entity0." ,".
                      " ".$l_artist_place->entity1." ,".
                      " ".$l_artist_place->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_place->last_updated)."',".
                      " ".$l_artist_place->link_order." ,".
                      "'".$this->sqlSafe($l_artist_place->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_place->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_artist_place->id = $id;
	    return($l_artist_place);	
    }


    /*********************************************************
     * Update a L_artist_place in musicbrainz database
     *
     * @param $l_artist_place
     * @return n/a
     *********************************************************
     */
    public function update($l_artist_place)
    {
        $query="UPDATE  l_artist_place ".
	          "SET ".
                      "id= ".$l_artist_place->id." ,".
                      "link= ".$l_artist_place->link." ,".
                      "entity0= ".$l_artist_place->entity0." ,".
                      "entity1= ".$l_artist_place->entity1." ,".
                      "edits_pending= ".$l_artist_place->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_artist_place->last_updated)."',".
                      "link_order= ".$l_artist_place->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_artist_place->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_artist_place->entity1_credit)."' ".                      
	          "WHERE id=".$l_artist_place->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_artist_place by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_artist_place WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>