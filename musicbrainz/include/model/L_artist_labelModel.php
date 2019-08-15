<?php
require_once "MusicbrainzDB.php";
require      "L_artist_label.php";

/********************************************************************
 * L_artist_labelModel inherits MusicbrainzDB and provides functions to
 * map L_artist_label class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_artist_labelModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_artist_label by id
     *
     * @return l_artist_label
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
	       "FROM l_artist_label ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_artist_label"));
    }

    /*********************************************************
     * Insert a new L_artist_label into musicbrainz database
     *
     * @param $l_artist_label
     * @return n/a
     *********************************************************
     */
    public function insert($l_artist_label)
    {
        $query="INSERT INTO l_artist_label ( ".
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
                      " ".$l_artist_label->link." ,".
                      " ".$l_artist_label->entity0." ,".
                      " ".$l_artist_label->entity1." ,".
                      " ".$l_artist_label->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_label->last_updated)."',".
                      " ".$l_artist_label->link_order." ,".
                      "'".$this->sqlSafe($l_artist_label->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_label->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_artist_label into musicbrainz database
     * and return a L_artist_label with new autoincrement
     * primary key
     *
     * @param  $l_artist_label
     * @return $l_artist_label
     *********************************************************
     */
    public function insert2($l_artist_label)
    {
        $query="INSERT INTO l_artist_label ( ".
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
                      " ".$l_artist_label->link." ,".
                      " ".$l_artist_label->entity0." ,".
                      " ".$l_artist_label->entity1." ,".
                      " ".$l_artist_label->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_label->last_updated)."',".
                      " ".$l_artist_label->link_order." ,".
                      "'".$this->sqlSafe($l_artist_label->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_label->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_artist_label->id = $id;
	    return($l_artist_label);	
    }


    /*********************************************************
     * Update a L_artist_label in musicbrainz database
     *
     * @param $l_artist_label
     * @return n/a
     *********************************************************
     */
    public function update($l_artist_label)
    {
        $query="UPDATE  l_artist_label ".
	          "SET ".
                      "id= ".$l_artist_label->id." ,".
                      "link= ".$l_artist_label->link." ,".
                      "entity0= ".$l_artist_label->entity0." ,".
                      "entity1= ".$l_artist_label->entity1." ,".
                      "edits_pending= ".$l_artist_label->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_artist_label->last_updated)."',".
                      "link_order= ".$l_artist_label->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_artist_label->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_artist_label->entity1_credit)."' ".                      
	          "WHERE id=".$l_artist_label->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_artist_label by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_artist_label WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>