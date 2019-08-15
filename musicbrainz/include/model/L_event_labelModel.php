<?php
require_once "MusicbrainzDB.php";
require      "L_event_label.php";

/********************************************************************
 * L_event_labelModel inherits MusicbrainzDB and provides functions to
 * map L_event_label class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_event_labelModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_event_label by id
     *
     * @return l_event_label
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
	       "FROM l_event_label ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_event_label"));
    }

    /*********************************************************
     * Insert a new L_event_label into musicbrainz database
     *
     * @param $l_event_label
     * @return n/a
     *********************************************************
     */
    public function insert($l_event_label)
    {
        $query="INSERT INTO l_event_label ( ".
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
                      " ".$l_event_label->link." ,".
                      " ".$l_event_label->entity0." ,".
                      " ".$l_event_label->entity1." ,".
                      " ".$l_event_label->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_label->last_updated)."',".
                      " ".$l_event_label->link_order." ,".
                      "'".$this->sqlSafe($l_event_label->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_label->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_event_label into musicbrainz database
     * and return a L_event_label with new autoincrement
     * primary key
     *
     * @param  $l_event_label
     * @return $l_event_label
     *********************************************************
     */
    public function insert2($l_event_label)
    {
        $query="INSERT INTO l_event_label ( ".
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
                      " ".$l_event_label->link." ,".
                      " ".$l_event_label->entity0." ,".
                      " ".$l_event_label->entity1." ,".
                      " ".$l_event_label->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_label->last_updated)."',".
                      " ".$l_event_label->link_order." ,".
                      "'".$this->sqlSafe($l_event_label->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_label->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_event_label->id = $id;
	    return($l_event_label);	
    }


    /*********************************************************
     * Update a L_event_label in musicbrainz database
     *
     * @param $l_event_label
     * @return n/a
     *********************************************************
     */
    public function update($l_event_label)
    {
        $query="UPDATE  l_event_label ".
	          "SET ".
                      "id= ".$l_event_label->id." ,".
                      "link= ".$l_event_label->link." ,".
                      "entity0= ".$l_event_label->entity0." ,".
                      "entity1= ".$l_event_label->entity1." ,".
                      "edits_pending= ".$l_event_label->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_event_label->last_updated)."',".
                      "link_order= ".$l_event_label->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_event_label->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_event_label->entity1_credit)."' ".                      
	          "WHERE id=".$l_event_label->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_event_label by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_event_label WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>