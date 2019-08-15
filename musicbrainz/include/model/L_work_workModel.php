<?php
require_once "MusicbrainzDB.php";
require      "L_work_work.php";

/********************************************************************
 * L_work_workModel inherits MusicbrainzDB and provides functions to
 * map L_work_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_work_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_work_work by id
     *
     * @return l_work_work
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
	       "FROM l_work_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_work_work"));
    }

    /*********************************************************
     * Insert a new L_work_work into musicbrainz database
     *
     * @param $l_work_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_work_work)
    {
        $query="INSERT INTO l_work_work ( ".
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
                      " ".$l_work_work->link." ,".
                      " ".$l_work_work->entity0." ,".
                      " ".$l_work_work->entity1." ,".
                      " ".$l_work_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_work_work->last_updated)."',".
                      " ".$l_work_work->link_order." ,".
                      "'".$this->sqlSafe($l_work_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_work_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_work_work into musicbrainz database
     * and return a L_work_work with new autoincrement
     * primary key
     *
     * @param  $l_work_work
     * @return $l_work_work
     *********************************************************
     */
    public function insert2($l_work_work)
    {
        $query="INSERT INTO l_work_work ( ".
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
                      " ".$l_work_work->link." ,".
                      " ".$l_work_work->entity0." ,".
                      " ".$l_work_work->entity1." ,".
                      " ".$l_work_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_work_work->last_updated)."',".
                      " ".$l_work_work->link_order." ,".
                      "'".$this->sqlSafe($l_work_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_work_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_work_work->id = $id;
	    return($l_work_work);	
    }


    /*********************************************************
     * Update a L_work_work in musicbrainz database
     *
     * @param $l_work_work
     * @return n/a
     *********************************************************
     */
    public function update($l_work_work)
    {
        $query="UPDATE  l_work_work ".
	          "SET ".
                      "id= ".$l_work_work->id." ,".
                      "link= ".$l_work_work->link." ,".
                      "entity0= ".$l_work_work->entity0." ,".
                      "entity1= ".$l_work_work->entity1." ,".
                      "edits_pending= ".$l_work_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_work_work->last_updated)."',".
                      "link_order= ".$l_work_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_work_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_work_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_work_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_work_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_work_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>