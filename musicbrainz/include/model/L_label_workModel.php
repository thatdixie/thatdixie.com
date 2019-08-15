<?php
require_once "MusicbrainzDB.php";
require      "L_label_work.php";

/********************************************************************
 * L_label_workModel inherits MusicbrainzDB and provides functions to
 * map L_label_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_label_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_label_work by id
     *
     * @return l_label_work
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
	       "FROM l_label_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_label_work"));
    }

    /*********************************************************
     * Insert a new L_label_work into musicbrainz database
     *
     * @param $l_label_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_label_work)
    {
        $query="INSERT INTO l_label_work ( ".
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
                      " ".$l_label_work->link." ,".
                      " ".$l_label_work->entity0." ,".
                      " ".$l_label_work->entity1." ,".
                      " ".$l_label_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_work->last_updated)."',".
                      " ".$l_label_work->link_order." ,".
                      "'".$this->sqlSafe($l_label_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_label_work into musicbrainz database
     * and return a L_label_work with new autoincrement
     * primary key
     *
     * @param  $l_label_work
     * @return $l_label_work
     *********************************************************
     */
    public function insert2($l_label_work)
    {
        $query="INSERT INTO l_label_work ( ".
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
                      " ".$l_label_work->link." ,".
                      " ".$l_label_work->entity0." ,".
                      " ".$l_label_work->entity1." ,".
                      " ".$l_label_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_work->last_updated)."',".
                      " ".$l_label_work->link_order." ,".
                      "'".$this->sqlSafe($l_label_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_label_work->id = $id;
	    return($l_label_work);	
    }


    /*********************************************************
     * Update a L_label_work in musicbrainz database
     *
     * @param $l_label_work
     * @return n/a
     *********************************************************
     */
    public function update($l_label_work)
    {
        $query="UPDATE  l_label_work ".
	          "SET ".
                      "id= ".$l_label_work->id." ,".
                      "link= ".$l_label_work->link." ,".
                      "entity0= ".$l_label_work->entity0." ,".
                      "entity1= ".$l_label_work->entity1." ,".
                      "edits_pending= ".$l_label_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_label_work->last_updated)."',".
                      "link_order= ".$l_label_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_label_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_label_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_label_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_label_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_label_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>