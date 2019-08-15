<?php
require_once "MusicbrainzDB.php";
require      "L_area_area.php";

/********************************************************************
 * L_area_areaModel inherits MusicbrainzDB and provides functions to
 * map L_area_area class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_areaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_area by id
     *
     * @return l_area_area
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
	       "FROM l_area_area ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_area"));
    }

    /*********************************************************
     * Insert a new L_area_area into musicbrainz database
     *
     * @param $l_area_area
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_area)
    {
        $query="INSERT INTO l_area_area ( ".
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
                      " ".$l_area_area->link." ,".
                      " ".$l_area_area->entity0." ,".
                      " ".$l_area_area->entity1." ,".
                      " ".$l_area_area->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_area->last_updated)."',".
                      " ".$l_area_area->link_order." ,".
                      "'".$this->sqlSafe($l_area_area->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_area->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_area into musicbrainz database
     * and return a L_area_area with new autoincrement
     * primary key
     *
     * @param  $l_area_area
     * @return $l_area_area
     *********************************************************
     */
    public function insert2($l_area_area)
    {
        $query="INSERT INTO l_area_area ( ".
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
                      " ".$l_area_area->link." ,".
                      " ".$l_area_area->entity0." ,".
                      " ".$l_area_area->entity1." ,".
                      " ".$l_area_area->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_area->last_updated)."',".
                      " ".$l_area_area->link_order." ,".
                      "'".$this->sqlSafe($l_area_area->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_area->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_area->id = $id;
	    return($l_area_area);	
    }


    /*********************************************************
     * Update a L_area_area in musicbrainz database
     *
     * @param $l_area_area
     * @return n/a
     *********************************************************
     */
    public function update($l_area_area)
    {
        $query="UPDATE  l_area_area ".
	          "SET ".
                      "id= ".$l_area_area->id." ,".
                      "link= ".$l_area_area->link." ,".
                      "entity0= ".$l_area_area->entity0." ,".
                      "entity1= ".$l_area_area->entity1." ,".
                      "edits_pending= ".$l_area_area->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_area->last_updated)."',".
                      "link_order= ".$l_area_area->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_area->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_area->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_area->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_area by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_area WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>