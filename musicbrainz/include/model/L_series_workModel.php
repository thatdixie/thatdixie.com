<?php
require_once "MusicbrainzDB.php";
require      "L_series_work.php";

/********************************************************************
 * L_series_workModel inherits MusicbrainzDB and provides functions to
 * map L_series_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_series_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_series_work by id
     *
     * @return l_series_work
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
	       "FROM l_series_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_series_work"));
    }

    /*********************************************************
     * Insert a new L_series_work into musicbrainz database
     *
     * @param $l_series_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_series_work)
    {
        $query="INSERT INTO l_series_work ( ".
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
                      " ".$l_series_work->link." ,".
                      " ".$l_series_work->entity0." ,".
                      " ".$l_series_work->entity1." ,".
                      " ".$l_series_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_series_work->last_updated)."',".
                      " ".$l_series_work->link_order." ,".
                      "'".$this->sqlSafe($l_series_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_series_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_series_work into musicbrainz database
     * and return a L_series_work with new autoincrement
     * primary key
     *
     * @param  $l_series_work
     * @return $l_series_work
     *********************************************************
     */
    public function insert2($l_series_work)
    {
        $query="INSERT INTO l_series_work ( ".
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
                      " ".$l_series_work->link." ,".
                      " ".$l_series_work->entity0." ,".
                      " ".$l_series_work->entity1." ,".
                      " ".$l_series_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_series_work->last_updated)."',".
                      " ".$l_series_work->link_order." ,".
                      "'".$this->sqlSafe($l_series_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_series_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_series_work->id = $id;
	    return($l_series_work);	
    }


    /*********************************************************
     * Update a L_series_work in musicbrainz database
     *
     * @param $l_series_work
     * @return n/a
     *********************************************************
     */
    public function update($l_series_work)
    {
        $query="UPDATE  l_series_work ".
	          "SET ".
                      "id= ".$l_series_work->id." ,".
                      "link= ".$l_series_work->link." ,".
                      "entity0= ".$l_series_work->entity0." ,".
                      "entity1= ".$l_series_work->entity1." ,".
                      "edits_pending= ".$l_series_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_series_work->last_updated)."',".
                      "link_order= ".$l_series_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_series_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_series_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_series_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_series_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_series_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>