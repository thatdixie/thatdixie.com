<?php
require_once "MusicbrainzDB.php";
require      "L_label_release.php";

/********************************************************************
 * L_label_releaseModel inherits MusicbrainzDB and provides functions to
 * map L_label_release class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_label_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_label_release by id
     *
     * @return l_label_release
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
	       "FROM l_label_release ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_label_release"));
    }

    /*********************************************************
     * Insert a new L_label_release into musicbrainz database
     *
     * @param $l_label_release
     * @return n/a
     *********************************************************
     */
    public function insert($l_label_release)
    {
        $query="INSERT INTO l_label_release ( ".
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
                      " ".$l_label_release->link." ,".
                      " ".$l_label_release->entity0." ,".
                      " ".$l_label_release->entity1." ,".
                      " ".$l_label_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_release->last_updated)."',".
                      " ".$l_label_release->link_order." ,".
                      "'".$this->sqlSafe($l_label_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_release->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_label_release into musicbrainz database
     * and return a L_label_release with new autoincrement
     * primary key
     *
     * @param  $l_label_release
     * @return $l_label_release
     *********************************************************
     */
    public function insert2($l_label_release)
    {
        $query="INSERT INTO l_label_release ( ".
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
                      " ".$l_label_release->link." ,".
                      " ".$l_label_release->entity0." ,".
                      " ".$l_label_release->entity1." ,".
                      " ".$l_label_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_release->last_updated)."',".
                      " ".$l_label_release->link_order." ,".
                      "'".$this->sqlSafe($l_label_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_release->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_label_release->id = $id;
	    return($l_label_release);	
    }


    /*********************************************************
     * Update a L_label_release in musicbrainz database
     *
     * @param $l_label_release
     * @return n/a
     *********************************************************
     */
    public function update($l_label_release)
    {
        $query="UPDATE  l_label_release ".
	          "SET ".
                      "id= ".$l_label_release->id." ,".
                      "link= ".$l_label_release->link." ,".
                      "entity0= ".$l_label_release->entity0." ,".
                      "entity1= ".$l_label_release->entity1." ,".
                      "edits_pending= ".$l_label_release->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_label_release->last_updated)."',".
                      "link_order= ".$l_label_release->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_label_release->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_label_release->entity1_credit)."' ".                      
	          "WHERE id=".$l_label_release->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_label_release by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_label_release WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>