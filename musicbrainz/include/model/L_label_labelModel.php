<?php
require_once "MusicbrainzDB.php";
require      "L_label_label.php";

/********************************************************************
 * L_label_labelModel inherits MusicbrainzDB and provides functions to
 * map L_label_label class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_label_labelModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_label_label by id
     *
     * @return l_label_label
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
	       "FROM l_label_label ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_label_label"));
    }

    /*********************************************************
     * Insert a new L_label_label into musicbrainz database
     *
     * @param $l_label_label
     * @return n/a
     *********************************************************
     */
    public function insert($l_label_label)
    {
        $query="INSERT INTO l_label_label ( ".
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
                      " ".$l_label_label->link." ,".
                      " ".$l_label_label->entity0." ,".
                      " ".$l_label_label->entity1." ,".
                      " ".$l_label_label->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_label->last_updated)."',".
                      " ".$l_label_label->link_order." ,".
                      "'".$this->sqlSafe($l_label_label->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_label->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_label_label into musicbrainz database
     * and return a L_label_label with new autoincrement
     * primary key
     *
     * @param  $l_label_label
     * @return $l_label_label
     *********************************************************
     */
    public function insert2($l_label_label)
    {
        $query="INSERT INTO l_label_label ( ".
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
                      " ".$l_label_label->link." ,".
                      " ".$l_label_label->entity0." ,".
                      " ".$l_label_label->entity1." ,".
                      " ".$l_label_label->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_label->last_updated)."',".
                      " ".$l_label_label->link_order." ,".
                      "'".$this->sqlSafe($l_label_label->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_label->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_label_label->id = $id;
	    return($l_label_label);	
    }


    /*********************************************************
     * Update a L_label_label in musicbrainz database
     *
     * @param $l_label_label
     * @return n/a
     *********************************************************
     */
    public function update($l_label_label)
    {
        $query="UPDATE  l_label_label ".
	          "SET ".
                      "id= ".$l_label_label->id." ,".
                      "link= ".$l_label_label->link." ,".
                      "entity0= ".$l_label_label->entity0." ,".
                      "entity1= ".$l_label_label->entity1." ,".
                      "edits_pending= ".$l_label_label->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_label_label->last_updated)."',".
                      "link_order= ".$l_label_label->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_label_label->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_label_label->entity1_credit)."' ".                      
	          "WHERE id=".$l_label_label->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_label_label by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_label_label WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>