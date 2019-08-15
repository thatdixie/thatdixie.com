<?php
require_once "MusicbrainzDB.php";
require      "L_artist_work.php";

/********************************************************************
 * L_artist_workModel inherits MusicbrainzDB and provides functions to
 * map L_artist_work class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_artist_workModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_artist_work by id
     *
     * @return l_artist_work
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
	       "FROM l_artist_work ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_artist_work"));
    }

    /*********************************************************
     * Insert a new L_artist_work into musicbrainz database
     *
     * @param $l_artist_work
     * @return n/a
     *********************************************************
     */
    public function insert($l_artist_work)
    {
        $query="INSERT INTO l_artist_work ( ".
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
                      " ".$l_artist_work->link." ,".
                      " ".$l_artist_work->entity0." ,".
                      " ".$l_artist_work->entity1." ,".
                      " ".$l_artist_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_work->last_updated)."',".
                      " ".$l_artist_work->link_order." ,".
                      "'".$this->sqlSafe($l_artist_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_work->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_artist_work into musicbrainz database
     * and return a L_artist_work with new autoincrement
     * primary key
     *
     * @param  $l_artist_work
     * @return $l_artist_work
     *********************************************************
     */
    public function insert2($l_artist_work)
    {
        $query="INSERT INTO l_artist_work ( ".
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
                      " ".$l_artist_work->link." ,".
                      " ".$l_artist_work->entity0." ,".
                      " ".$l_artist_work->entity1." ,".
                      " ".$l_artist_work->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_work->last_updated)."',".
                      " ".$l_artist_work->link_order." ,".
                      "'".$this->sqlSafe($l_artist_work->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_work->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_artist_work->id = $id;
	    return($l_artist_work);	
    }


    /*********************************************************
     * Update a L_artist_work in musicbrainz database
     *
     * @param $l_artist_work
     * @return n/a
     *********************************************************
     */
    public function update($l_artist_work)
    {
        $query="UPDATE  l_artist_work ".
	          "SET ".
                      "id= ".$l_artist_work->id." ,".
                      "link= ".$l_artist_work->link." ,".
                      "entity0= ".$l_artist_work->entity0." ,".
                      "entity1= ".$l_artist_work->entity1." ,".
                      "edits_pending= ".$l_artist_work->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_artist_work->last_updated)."',".
                      "link_order= ".$l_artist_work->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_artist_work->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_artist_work->entity1_credit)."' ".                      
	          "WHERE id=".$l_artist_work->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_artist_work by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_artist_work WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>