<?php
require_once "MusicbrainzDB.php";
require      "L_instrument_label.php";

/********************************************************************
 * L_instrument_labelModel inherits MusicbrainzDB and provides functions to
 * map L_instrument_label class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_instrument_labelModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_instrument_label by id
     *
     * @return l_instrument_label
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
	       "FROM l_instrument_label ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_instrument_label"));
    }

    /*********************************************************
     * Insert a new L_instrument_label into musicbrainz database
     *
     * @param $l_instrument_label
     * @return n/a
     *********************************************************
     */
    public function insert($l_instrument_label)
    {
        $query="INSERT INTO l_instrument_label ( ".
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
                      " ".$l_instrument_label->link." ,".
                      " ".$l_instrument_label->entity0." ,".
                      " ".$l_instrument_label->entity1." ,".
                      " ".$l_instrument_label->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_label->last_updated)."',".
                      " ".$l_instrument_label->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_label->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_label->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_instrument_label into musicbrainz database
     * and return a L_instrument_label with new autoincrement
     * primary key
     *
     * @param  $l_instrument_label
     * @return $l_instrument_label
     *********************************************************
     */
    public function insert2($l_instrument_label)
    {
        $query="INSERT INTO l_instrument_label ( ".
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
                      " ".$l_instrument_label->link." ,".
                      " ".$l_instrument_label->entity0." ,".
                      " ".$l_instrument_label->entity1." ,".
                      " ".$l_instrument_label->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_label->last_updated)."',".
                      " ".$l_instrument_label->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_label->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_label->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_instrument_label->id = $id;
	    return($l_instrument_label);	
    }


    /*********************************************************
     * Update a L_instrument_label in musicbrainz database
     *
     * @param $l_instrument_label
     * @return n/a
     *********************************************************
     */
    public function update($l_instrument_label)
    {
        $query="UPDATE  l_instrument_label ".
	          "SET ".
                      "id= ".$l_instrument_label->id." ,".
                      "link= ".$l_instrument_label->link." ,".
                      "entity0= ".$l_instrument_label->entity0." ,".
                      "entity1= ".$l_instrument_label->entity1." ,".
                      "edits_pending= ".$l_instrument_label->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_instrument_label->last_updated)."',".
                      "link_order= ".$l_instrument_label->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_instrument_label->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_instrument_label->entity1_credit)."' ".                      
	          "WHERE id=".$l_instrument_label->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_instrument_label by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_instrument_label WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>