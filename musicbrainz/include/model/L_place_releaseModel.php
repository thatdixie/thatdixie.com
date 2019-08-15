<?php
require_once "MusicbrainzDB.php";
require      "L_place_release.php";

/********************************************************************
 * L_place_releaseModel inherits MusicbrainzDB and provides functions to
 * map L_place_release class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_place_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_place_release by id
     *
     * @return l_place_release
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
	       "FROM l_place_release ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_place_release"));
    }

    /*********************************************************
     * Insert a new L_place_release into musicbrainz database
     *
     * @param $l_place_release
     * @return n/a
     *********************************************************
     */
    public function insert($l_place_release)
    {
        $query="INSERT INTO l_place_release ( ".
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
                      " ".$l_place_release->link." ,".
                      " ".$l_place_release->entity0." ,".
                      " ".$l_place_release->entity1." ,".
                      " ".$l_place_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_release->last_updated)."',".
                      " ".$l_place_release->link_order." ,".
                      "'".$this->sqlSafe($l_place_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_release->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_place_release into musicbrainz database
     * and return a L_place_release with new autoincrement
     * primary key
     *
     * @param  $l_place_release
     * @return $l_place_release
     *********************************************************
     */
    public function insert2($l_place_release)
    {
        $query="INSERT INTO l_place_release ( ".
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
                      " ".$l_place_release->link." ,".
                      " ".$l_place_release->entity0." ,".
                      " ".$l_place_release->entity1." ,".
                      " ".$l_place_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_release->last_updated)."',".
                      " ".$l_place_release->link_order." ,".
                      "'".$this->sqlSafe($l_place_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_release->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_place_release->id = $id;
	    return($l_place_release);	
    }


    /*********************************************************
     * Update a L_place_release in musicbrainz database
     *
     * @param $l_place_release
     * @return n/a
     *********************************************************
     */
    public function update($l_place_release)
    {
        $query="UPDATE  l_place_release ".
	          "SET ".
                      "id= ".$l_place_release->id." ,".
                      "link= ".$l_place_release->link." ,".
                      "entity0= ".$l_place_release->entity0." ,".
                      "entity1= ".$l_place_release->entity1." ,".
                      "edits_pending= ".$l_place_release->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_place_release->last_updated)."',".
                      "link_order= ".$l_place_release->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_place_release->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_place_release->entity1_credit)."' ".                      
	          "WHERE id=".$l_place_release->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_place_release by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_place_release WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>