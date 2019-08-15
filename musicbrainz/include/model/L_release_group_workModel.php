<?php
require_once "MusicbrainzDB.php";
require      "L_release_group_work.php";

/********************************************************************
 * L_release_group_workModel inherits MusicbrainzDB and provides functions to
 * map L_release_group_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_release_group_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_release_group_work by id
     *
     * @return l_release_group_work
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
	       "FROM l_release_group_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_release_group_work"));
    }

    /*********************************************************
     * Insert a new L_release_group_work into musicbrainz database
     *
     * @param $l_release_group_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_release_group_work)
    {
        $query="INSERT INTO l_release_group_work ( ".
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
                      " ".$l_release_group_work->link." ,".
                      " ".$l_release_group_work->entity0." ,".
                      " ".$l_release_group_work->entity1." ,".
                      " ".$l_release_group_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_release_group_work->last_updated)."',".
                      " ".$l_release_group_work->link_order." ,".
                      "'".$this->sqlSafe($l_release_group_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_release_group_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_release_group_work into musicbrainz database
     * and return a L_release_group_work with new autoincrement
     * primary key
     *
     * @param  $l_release_group_work
     * @return $l_release_group_work
     *********************************************************
     */
    public function insert2($l_release_group_work)
    {
        $query="INSERT INTO l_release_group_work ( ".
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
                      " ".$l_release_group_work->link." ,".
                      " ".$l_release_group_work->entity0." ,".
                      " ".$l_release_group_work->entity1." ,".
                      " ".$l_release_group_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_release_group_work->last_updated)."',".
                      " ".$l_release_group_work->link_order." ,".
                      "'".$this->sqlSafe($l_release_group_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_release_group_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_release_group_work->id = $id;
	    return($l_release_group_work);	
    }


    /*********************************************************
     * Update a L_release_group_work in musicbrainz database
     *
     * @param $l_release_group_work
     * @return n/a
     *********************************************************
     */
    public function update($l_release_group_work)
    {
        $query="UPDATE  l_release_group_work ".
	          "SET ".
                      "id= ".$l_release_group_work->id." ,".
                      "link= ".$l_release_group_work->link." ,".
                      "entity0= ".$l_release_group_work->entity0." ,".
                      "entity1= ".$l_release_group_work->entity1." ,".
                      "edits_pending= ".$l_release_group_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_release_group_work->last_updated)."',".
                      "link_order= ".$l_release_group_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_release_group_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_release_group_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_release_group_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_release_group_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_release_group_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>