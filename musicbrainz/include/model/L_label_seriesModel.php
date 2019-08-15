<?php
require_once "MusicbrainzDB.php";
require      "L_label_series.php";

/********************************************************************
 * L_label_seriesModel inherits MusicbrainzDB and provides functions to
 * map L_label_series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_label_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_label_series by id
     *
     * @return l_label_series
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
	       "FROM l_label_series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_label_series"));
    }

    /*********************************************************
     * Insert a new L_label_series into musicbrainz database
     *
     * @param $l_label_series
     * @return n/a
     *********************************************************
     */
    public function insert($l_label_series)
    {
        $query="INSERT INTO l_label_series ( ".
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
                      " ".$l_label_series->link." ,".
                      " ".$l_label_series->entity0." ,".
                      " ".$l_label_series->entity1." ,".
                      " ".$l_label_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_series->last_updated)."',".
                      " ".$l_label_series->link_order." ,".
                      "'".$this->sqlSafe($l_label_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_series->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_label_series into musicbrainz database
     * and return a L_label_series with new autoincrement
     * primary key
     *
     * @param  $l_label_series
     * @return $l_label_series
     *********************************************************
     */
    public function insert2($l_label_series)
    {
        $query="INSERT INTO l_label_series ( ".
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
                      " ".$l_label_series->link." ,".
                      " ".$l_label_series->entity0." ,".
                      " ".$l_label_series->entity1." ,".
                      " ".$l_label_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_series->last_updated)."',".
                      " ".$l_label_series->link_order." ,".
                      "'".$this->sqlSafe($l_label_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_series->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_label_series->id = $id;
	    return($l_label_series);	
    }


    /*********************************************************
     * Update a L_label_series in musicbrainz database
     *
     * @param $l_label_series
     * @return n/a
     *********************************************************
     */
    public function update($l_label_series)
    {
        $query="UPDATE  l_label_series ".
	          "SET ".
                      "id= ".$l_label_series->id." ,".
                      "link= ".$l_label_series->link." ,".
                      "entity0= ".$l_label_series->entity0." ,".
                      "entity1= ".$l_label_series->entity1." ,".
                      "edits_pending= ".$l_label_series->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_label_series->last_updated)."',".
                      "link_order= ".$l_label_series->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_label_series->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_label_series->entity1_credit)."' ".                      
	          "WHERE id=".$l_label_series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_label_series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_label_series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>