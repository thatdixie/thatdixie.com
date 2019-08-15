<?php
require_once "MusicbrainzDB.php";
require      "L_area_label.php";

/********************************************************************
 * L_area_labelModel inherits MusicbrainzDB and provides functions to
 * map L_area_label class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_labelModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_label by id
     *
     * @return l_area_label
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
	       "FROM l_area_label ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_label"));
    }

    /*********************************************************
     * Insert a new L_area_label into musicbrainz database
     *
     * @param $l_area_label
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_label)
    {
        $query="INSERT INTO l_area_label ( ".
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
                      " ".$l_area_label->link." ,".
                      " ".$l_area_label->entity0." ,".
                      " ".$l_area_label->entity1." ,".
                      " ".$l_area_label->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_label->last_updated)."',".
                      " ".$l_area_label->link_order." ,".
                      "'".$this->sqlSafe($l_area_label->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_label->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_label into musicbrainz database
     * and return a L_area_label with new autoincrement
     * primary key
     *
     * @param  $l_area_label
     * @return $l_area_label
     *********************************************************
     */
    public function insert2($l_area_label)
    {
        $query="INSERT INTO l_area_label ( ".
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
                      " ".$l_area_label->link." ,".
                      " ".$l_area_label->entity0." ,".
                      " ".$l_area_label->entity1." ,".
                      " ".$l_area_label->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_label->last_updated)."',".
                      " ".$l_area_label->link_order." ,".
                      "'".$this->sqlSafe($l_area_label->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_label->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_label->id = $id;
	    return($l_area_label);	
    }


    /*********************************************************
     * Update a L_area_label in musicbrainz database
     *
     * @param $l_area_label
     * @return n/a
     *********************************************************
     */
    public function update($l_area_label)
    {
        $query="UPDATE  l_area_label ".
	          "SET ".
                      "id= ".$l_area_label->id." ,".
                      "link= ".$l_area_label->link." ,".
                      "entity0= ".$l_area_label->entity0." ,".
                      "entity1= ".$l_area_label->entity1." ,".
                      "edits_pending= ".$l_area_label->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_label->last_updated)."',".
                      "link_order= ".$l_area_label->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_label->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_label->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_label->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_label by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_label WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>