<?php
require_once "MusicbrainzDB.php";
require      "L_place_release_group.php";

/********************************************************************
 * L_place_release_groupModel inherits MusicbrainzDB and provides functions to
 * map L_place_release_group class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_place_release_groupModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_place_release_group by id
     *
     * @return l_place_release_group
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
	       "FROM l_place_release_group ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_place_release_group"));
    }

    /*********************************************************
     * Insert a new L_place_release_group into musicbrainz database
     *
     * @param $l_place_release_group
     * @return n/a
     *********************************************************
     */
    public function insert($l_place_release_group)
    {
        $query="INSERT INTO l_place_release_group ( ".
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
                      " ".$l_place_release_group->link." ,".
                      " ".$l_place_release_group->entity0." ,".
                      " ".$l_place_release_group->entity1." ,".
                      " ".$l_place_release_group->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_release_group->last_updated)."',".
                      " ".$l_place_release_group->link_order." ,".
                      "'".$this->sqlSafe($l_place_release_group->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_release_group->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_place_release_group into musicbrainz database
     * and return a L_place_release_group with new autoincrement
     * primary key
     *
     * @param  $l_place_release_group
     * @return $l_place_release_group
     *********************************************************
     */
    public function insert2($l_place_release_group)
    {
        $query="INSERT INTO l_place_release_group ( ".
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
                      " ".$l_place_release_group->link." ,".
                      " ".$l_place_release_group->entity0." ,".
                      " ".$l_place_release_group->entity1." ,".
                      " ".$l_place_release_group->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_release_group->last_updated)."',".
                      " ".$l_place_release_group->link_order." ,".
                      "'".$this->sqlSafe($l_place_release_group->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_release_group->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_place_release_group->id = $id;
	    return($l_place_release_group);	
    }


    /*********************************************************
     * Update a L_place_release_group in musicbrainz database
     *
     * @param $l_place_release_group
     * @return n/a
     *********************************************************
     */
    public function update($l_place_release_group)
    {
        $query="UPDATE  l_place_release_group ".
	          "SET ".
                      "id= ".$l_place_release_group->id." ,".
                      "link= ".$l_place_release_group->link." ,".
                      "entity0= ".$l_place_release_group->entity0." ,".
                      "entity1= ".$l_place_release_group->entity1." ,".
                      "edits_pending= ".$l_place_release_group->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_place_release_group->last_updated)."',".
                      "link_order= ".$l_place_release_group->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_place_release_group->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_place_release_group->entity1_credit)."' ".                      
	          "WHERE id=".$l_place_release_group->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_place_release_group by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_place_release_group WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>