<?php
require_once "MusicbrainzDB.php";
require      "L_url_work.php";

/********************************************************************
 * L_url_workModel inherits MusicbrainzDB and provides functions to
 * map L_url_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_url_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_url_work by id
     *
     * @return l_url_work
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
	       "FROM l_url_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_url_work"));
    }

    /*********************************************************
     * Insert a new L_url_work into musicbrainz database
     *
     * @param $l_url_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_url_work)
    {
        $query="INSERT INTO l_url_work ( ".
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
                      " ".$l_url_work->link." ,".
                      " ".$l_url_work->entity0." ,".
                      " ".$l_url_work->entity1." ,".
                      " ".$l_url_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_url_work->last_updated)."',".
                      " ".$l_url_work->link_order." ,".
                      "'".$this->sqlSafe($l_url_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_url_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_url_work into musicbrainz database
     * and return a L_url_work with new autoincrement
     * primary key
     *
     * @param  $l_url_work
     * @return $l_url_work
     *********************************************************
     */
    public function insert2($l_url_work)
    {
        $query="INSERT INTO l_url_work ( ".
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
                      " ".$l_url_work->link." ,".
                      " ".$l_url_work->entity0." ,".
                      " ".$l_url_work->entity1." ,".
                      " ".$l_url_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_url_work->last_updated)."',".
                      " ".$l_url_work->link_order." ,".
                      "'".$this->sqlSafe($l_url_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_url_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_url_work->id = $id;
	    return($l_url_work);	
    }


    /*********************************************************
     * Update a L_url_work in musicbrainz database
     *
     * @param $l_url_work
     * @return n/a
     *********************************************************
     */
    public function update($l_url_work)
    {
        $query="UPDATE  l_url_work ".
	          "SET ".
                      "id= ".$l_url_work->id." ,".
                      "link= ".$l_url_work->link." ,".
                      "entity0= ".$l_url_work->entity0." ,".
                      "entity1= ".$l_url_work->entity1." ,".
                      "edits_pending= ".$l_url_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_url_work->last_updated)."',".
                      "link_order= ".$l_url_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_url_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_url_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_url_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_url_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_url_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>