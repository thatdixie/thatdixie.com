<?php
require_once "MusicbrainzDB.php";
require      "L_artist_release.php";

/********************************************************************
 * L_artist_releaseModel inherits MusicbrainzDB and provides functions to
 * map L_artist_release class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_artist_releaseModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_artist_release by id
     *
     * @return l_artist_release
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
	       "FROM l_artist_release ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_artist_release"));
    }

    /*********************************************************
     * Insert a new L_artist_release into musicbrainz database
     *
     * @param $l_artist_release
     * @return n/a
     *********************************************************
     */
    public function insert($l_artist_release)
    {
        $query="INSERT INTO l_artist_release ( ".
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
                      " ".$l_artist_release->link." ,".
                      " ".$l_artist_release->entity0." ,".
                      " ".$l_artist_release->entity1." ,".
                      " ".$l_artist_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_release->last_updated)."',".
                      " ".$l_artist_release->link_order." ,".
                      "'".$this->sqlSafe($l_artist_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_release->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_artist_release into musicbrainz database
     * and return a L_artist_release with new autoincrement
     * primary key
     *
     * @param  $l_artist_release
     * @return $l_artist_release
     *********************************************************
     */
    public function insert2($l_artist_release)
    {
        $query="INSERT INTO l_artist_release ( ".
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
                      " ".$l_artist_release->link." ,".
                      " ".$l_artist_release->entity0." ,".
                      " ".$l_artist_release->entity1." ,".
                      " ".$l_artist_release->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_release->last_updated)."',".
                      " ".$l_artist_release->link_order." ,".
                      "'".$this->sqlSafe($l_artist_release->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_release->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_artist_release->id = $id;
	    return($l_artist_release);	
    }


    /*********************************************************
     * Update a L_artist_release in musicbrainz database
     *
     * @param $l_artist_release
     * @return n/a
     *********************************************************
     */
    public function update($l_artist_release)
    {
        $query="UPDATE  l_artist_release ".
	          "SET ".
                      "id= ".$l_artist_release->id." ,".
                      "link= ".$l_artist_release->link." ,".
                      "entity0= ".$l_artist_release->entity0." ,".
                      "entity1= ".$l_artist_release->entity1." ,".
                      "edits_pending= ".$l_artist_release->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_artist_release->last_updated)."',".
                      "link_order= ".$l_artist_release->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_artist_release->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_artist_release->entity1_credit)."' ".                      
	          "WHERE id=".$l_artist_release->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_artist_release by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_artist_release WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>