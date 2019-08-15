<?php
require_once "MusicbrainzDB.php";
require      "L_instrument_work.php";

/********************************************************************
 * L_instrument_workModel inherits MusicbrainzDB and provides functions to
 * map L_instrument_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_instrument_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_instrument_work by id
     *
     * @return l_instrument_work
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
	       "FROM l_instrument_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_instrument_work"));
    }

    /*********************************************************
     * Insert a new L_instrument_work into musicbrainz database
     *
     * @param $l_instrument_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_instrument_work)
    {
        $query="INSERT INTO l_instrument_work ( ".
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
                      " ".$l_instrument_work->link." ,".
                      " ".$l_instrument_work->entity0." ,".
                      " ".$l_instrument_work->entity1." ,".
                      " ".$l_instrument_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_work->last_updated)."',".
                      " ".$l_instrument_work->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_instrument_work into musicbrainz database
     * and return a L_instrument_work with new autoincrement
     * primary key
     *
     * @param  $l_instrument_work
     * @return $l_instrument_work
     *********************************************************
     */
    public function insert2($l_instrument_work)
    {
        $query="INSERT INTO l_instrument_work ( ".
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
                      " ".$l_instrument_work->link." ,".
                      " ".$l_instrument_work->entity0." ,".
                      " ".$l_instrument_work->entity1." ,".
                      " ".$l_instrument_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_work->last_updated)."',".
                      " ".$l_instrument_work->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_instrument_work->id = $id;
	    return($l_instrument_work);	
    }


    /*********************************************************
     * Update a L_instrument_work in musicbrainz database
     *
     * @param $l_instrument_work
     * @return n/a
     *********************************************************
     */
    public function update($l_instrument_work)
    {
        $query="UPDATE  l_instrument_work ".
	          "SET ".
                      "id= ".$l_instrument_work->id." ,".
                      "link= ".$l_instrument_work->link." ,".
                      "entity0= ".$l_instrument_work->entity0." ,".
                      "entity1= ".$l_instrument_work->entity1." ,".
                      "edits_pending= ".$l_instrument_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_instrument_work->last_updated)."',".
                      "link_order= ".$l_instrument_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_instrument_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_instrument_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_instrument_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_instrument_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_instrument_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>