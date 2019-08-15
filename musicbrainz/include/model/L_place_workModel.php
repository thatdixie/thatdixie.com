<?php
require_once "MusicbrainzDB.php";
require      "L_place_work.php";

/********************************************************************
 * L_place_workModel inherits MusicbrainzDB and provides functions to
 * map L_place_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_place_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_place_work by id
     *
     * @return l_place_work
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
	       "FROM l_place_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_place_work"));
    }

    /*********************************************************
     * Insert a new L_place_work into musicbrainz database
     *
     * @param $l_place_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_place_work)
    {
        $query="INSERT INTO l_place_work ( ".
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
                      " ".$l_place_work->link." ,".
                      " ".$l_place_work->entity0." ,".
                      " ".$l_place_work->entity1." ,".
                      " ".$l_place_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_work->last_updated)."',".
                      " ".$l_place_work->link_order." ,".
                      "'".$this->sqlSafe($l_place_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_place_work into musicbrainz database
     * and return a L_place_work with new autoincrement
     * primary key
     *
     * @param  $l_place_work
     * @return $l_place_work
     *********************************************************
     */
    public function insert2($l_place_work)
    {
        $query="INSERT INTO l_place_work ( ".
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
                      " ".$l_place_work->link." ,".
                      " ".$l_place_work->entity0." ,".
                      " ".$l_place_work->entity1." ,".
                      " ".$l_place_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_work->last_updated)."',".
                      " ".$l_place_work->link_order." ,".
                      "'".$this->sqlSafe($l_place_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_place_work->id = $id;
	    return($l_place_work);	
    }


    /*********************************************************
     * Update a L_place_work in musicbrainz database
     *
     * @param $l_place_work
     * @return n/a
     *********************************************************
     */
    public function update($l_place_work)
    {
        $query="UPDATE  l_place_work ".
	          "SET ".
                      "id= ".$l_place_work->id." ,".
                      "link= ".$l_place_work->link." ,".
                      "entity0= ".$l_place_work->entity0." ,".
                      "entity1= ".$l_place_work->entity1." ,".
                      "edits_pending= ".$l_place_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_place_work->last_updated)."',".
                      "link_order= ".$l_place_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_place_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_place_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_place_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_place_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_place_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>