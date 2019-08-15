<?php
require_once "MusicbrainzDB.php";
require      "L_area_release.php";

/********************************************************************
 * L_area_releaseModel inherits MusicbrainzDB and provides functions to
 * map L_area_release class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_release by id
     *
     * @return l_area_release
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
	       "FROM l_area_release ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_release"));
    }

    /*********************************************************
     * Insert a new L_area_release into musicbrainz database
     *
     * @param $l_area_release
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_release)
    {
        $query="INSERT INTO l_area_release ( ".
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
                      " ".$l_area_release->link." ,".
                      " ".$l_area_release->entity0." ,".
                      " ".$l_area_release->entity1." ,".
                      " ".$l_area_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_release->last_updated)."',".
                      " ".$l_area_release->link_order." ,".
                      "'".$this->sqlSafe($l_area_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_release->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_release into musicbrainz database
     * and return a L_area_release with new autoincrement
     * primary key
     *
     * @param  $l_area_release
     * @return $l_area_release
     *********************************************************
     */
    public function insert2($l_area_release)
    {
        $query="INSERT INTO l_area_release ( ".
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
                      " ".$l_area_release->link." ,".
                      " ".$l_area_release->entity0." ,".
                      " ".$l_area_release->entity1." ,".
                      " ".$l_area_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_release->last_updated)."',".
                      " ".$l_area_release->link_order." ,".
                      "'".$this->sqlSafe($l_area_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_release->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_release->id = $id;
	    return($l_area_release);	
    }


    /*********************************************************
     * Update a L_area_release in musicbrainz database
     *
     * @param $l_area_release
     * @return n/a
     *********************************************************
     */
    public function update($l_area_release)
    {
        $query="UPDATE  l_area_release ".
	          "SET ".
                      "id= ".$l_area_release->id." ,".
                      "link= ".$l_area_release->link." ,".
                      "entity0= ".$l_area_release->entity0." ,".
                      "entity1= ".$l_area_release->entity1." ,".
                      "edits_pending= ".$l_area_release->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_release->last_updated)."',".
                      "link_order= ".$l_area_release->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_release->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_release->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_release->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_release by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_release WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>