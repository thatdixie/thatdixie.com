<?php
require_once "MusicbrainzDB.php";
require      "L_area_work.php";

/********************************************************************
 * L_area_workModel inherits MusicbrainzDB and provides functions to
 * map L_area_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_work by id
     *
     * @return l_area_work
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
	       "FROM l_area_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_work"));
    }

    /*********************************************************
     * Insert a new L_area_work into musicbrainz database
     *
     * @param $l_area_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_work)
    {
        $query="INSERT INTO l_area_work ( ".
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
                      " ".$l_area_work->link." ,".
                      " ".$l_area_work->entity0." ,".
                      " ".$l_area_work->entity1." ,".
                      " ".$l_area_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_work->last_updated)."',".
                      " ".$l_area_work->link_order." ,".
                      "'".$this->sqlSafe($l_area_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_work into musicbrainz database
     * and return a L_area_work with new autoincrement
     * primary key
     *
     * @param  $l_area_work
     * @return $l_area_work
     *********************************************************
     */
    public function insert2($l_area_work)
    {
        $query="INSERT INTO l_area_work ( ".
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
                      " ".$l_area_work->link." ,".
                      " ".$l_area_work->entity0." ,".
                      " ".$l_area_work->entity1." ,".
                      " ".$l_area_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_work->last_updated)."',".
                      " ".$l_area_work->link_order." ,".
                      "'".$this->sqlSafe($l_area_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_work->id = $id;
	    return($l_area_work);	
    }


    /*********************************************************
     * Update a L_area_work in musicbrainz database
     *
     * @param $l_area_work
     * @return n/a
     *********************************************************
     */
    public function update($l_area_work)
    {
        $query="UPDATE  l_area_work ".
	          "SET ".
                      "id= ".$l_area_work->id." ,".
                      "link= ".$l_area_work->link." ,".
                      "entity0= ".$l_area_work->entity0." ,".
                      "entity1= ".$l_area_work->entity1." ,".
                      "edits_pending= ".$l_area_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_work->last_updated)."',".
                      "link_order= ".$l_area_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>