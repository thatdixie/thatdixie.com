<?php
require_once "MusicbrainzDB.php";
require      "L_release_release.php";

/********************************************************************
 * L_release_releaseModel inherits MusicbrainzDB and provides functions to
 * map L_release_release class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_release_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_release_release by id
     *
     * @return l_release_release
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
	       "FROM l_release_release ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_release_release"));
    }

    /*********************************************************
     * Insert a new L_release_release into musicbrainz database
     *
     * @param $l_release_release
     * @return n/a
     *********************************************************
     */
    public function insert($l_release_release)
    {
        $query="INSERT INTO l_release_release ( ".
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
                      " ".$l_release_release->link." ,".
                      " ".$l_release_release->entity0." ,".
                      " ".$l_release_release->entity1." ,".
                      " ".$l_release_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_release_release->last_updated)."',".
                      " ".$l_release_release->link_order." ,".
                      "'".$this->sqlSafe($l_release_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_release_release->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_release_release into musicbrainz database
     * and return a L_release_release with new autoincrement
     * primary key
     *
     * @param  $l_release_release
     * @return $l_release_release
     *********************************************************
     */
    public function insert2($l_release_release)
    {
        $query="INSERT INTO l_release_release ( ".
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
                      " ".$l_release_release->link." ,".
                      " ".$l_release_release->entity0." ,".
                      " ".$l_release_release->entity1." ,".
                      " ".$l_release_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_release_release->last_updated)."',".
                      " ".$l_release_release->link_order." ,".
                      "'".$this->sqlSafe($l_release_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_release_release->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_release_release->id = $id;
	    return($l_release_release);	
    }


    /*********************************************************
     * Update a L_release_release in musicbrainz database
     *
     * @param $l_release_release
     * @return n/a
     *********************************************************
     */
    public function update($l_release_release)
    {
        $query="UPDATE  l_release_release ".
	          "SET ".
                      "id= ".$l_release_release->id." ,".
                      "link= ".$l_release_release->link." ,".
                      "entity0= ".$l_release_release->entity0." ,".
                      "entity1= ".$l_release_release->entity1." ,".
                      "edits_pending= ".$l_release_release->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_release_release->last_updated)."',".
                      "link_order= ".$l_release_release->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_release_release->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_release_release->entity1_credit)."' ".                      
	          "WHERE id=".$l_release_release->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_release_release by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_release_release WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>