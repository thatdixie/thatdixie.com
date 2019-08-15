<?php
require_once "MusicbrainzDB.php";
require      "L_instrument_release.php";

/********************************************************************
 * L_instrument_releaseModel inherits MusicbrainzDB and provides functions to
 * map L_instrument_release class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_instrument_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_instrument_release by id
     *
     * @return l_instrument_release
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
	       "FROM l_instrument_release ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_instrument_release"));
    }

    /*********************************************************
     * Insert a new L_instrument_release into musicbrainz database
     *
     * @param $l_instrument_release
     * @return n/a
     *********************************************************
     */
    public function insert($l_instrument_release)
    {
        $query="INSERT INTO l_instrument_release ( ".
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
                      " ".$l_instrument_release->link." ,".
                      " ".$l_instrument_release->entity0." ,".
                      " ".$l_instrument_release->entity1." ,".
                      " ".$l_instrument_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_release->last_updated)."',".
                      " ".$l_instrument_release->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_release->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_instrument_release into musicbrainz database
     * and return a L_instrument_release with new autoincrement
     * primary key
     *
     * @param  $l_instrument_release
     * @return $l_instrument_release
     *********************************************************
     */
    public function insert2($l_instrument_release)
    {
        $query="INSERT INTO l_instrument_release ( ".
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
                      " ".$l_instrument_release->link." ,".
                      " ".$l_instrument_release->entity0." ,".
                      " ".$l_instrument_release->entity1." ,".
                      " ".$l_instrument_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_release->last_updated)."',".
                      " ".$l_instrument_release->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_release->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_instrument_release->id = $id;
	    return($l_instrument_release);	
    }


    /*********************************************************
     * Update a L_instrument_release in musicbrainz database
     *
     * @param $l_instrument_release
     * @return n/a
     *********************************************************
     */
    public function update($l_instrument_release)
    {
        $query="UPDATE  l_instrument_release ".
	          "SET ".
                      "id= ".$l_instrument_release->id." ,".
                      "link= ".$l_instrument_release->link." ,".
                      "entity0= ".$l_instrument_release->entity0." ,".
                      "entity1= ".$l_instrument_release->entity1." ,".
                      "edits_pending= ".$l_instrument_release->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_instrument_release->last_updated)."',".
                      "link_order= ".$l_instrument_release->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_instrument_release->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_instrument_release->entity1_credit)."' ".                      
	          "WHERE id=".$l_instrument_release->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_instrument_release by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_instrument_release WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>