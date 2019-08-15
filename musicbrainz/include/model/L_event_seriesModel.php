<?php
require_once "MusicbrainzDB.php";
require      "L_event_series.php";

/********************************************************************
 * L_event_seriesModel inherits MusicbrainzDB and provides functions to
 * map L_event_series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_event_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_event_series by id
     *
     * @return l_event_series
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
	       "FROM l_event_series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_event_series"));
    }

    /*********************************************************
     * Insert a new L_event_series into musicbrainz database
     *
     * @param $l_event_series
     * @return n/a
     *********************************************************
     */
    public function insert($l_event_series)
    {
        $query="INSERT INTO l_event_series ( ".
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
                      " ".$l_event_series->link." ,".
                      " ".$l_event_series->entity0." ,".
                      " ".$l_event_series->entity1." ,".
                      " ".$l_event_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_series->last_updated)."',".
                      " ".$l_event_series->link_order." ,".
                      "'".$this->sqlSafe($l_event_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_series->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_event_series into musicbrainz database
     * and return a L_event_series with new autoincrement
     * primary key
     *
     * @param  $l_event_series
     * @return $l_event_series
     *********************************************************
     */
    public function insert2($l_event_series)
    {
        $query="INSERT INTO l_event_series ( ".
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
                      " ".$l_event_series->link." ,".
                      " ".$l_event_series->entity0." ,".
                      " ".$l_event_series->entity1." ,".
                      " ".$l_event_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_series->last_updated)."',".
                      " ".$l_event_series->link_order." ,".
                      "'".$this->sqlSafe($l_event_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_series->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_event_series->id = $id;
	    return($l_event_series);	
    }


    /*********************************************************
     * Update a L_event_series in musicbrainz database
     *
     * @param $l_event_series
     * @return n/a
     *********************************************************
     */
    public function update($l_event_series)
    {
        $query="UPDATE  l_event_series ".
	          "SET ".
                      "id= ".$l_event_series->id." ,".
                      "link= ".$l_event_series->link." ,".
                      "entity0= ".$l_event_series->entity0." ,".
                      "entity1= ".$l_event_series->entity1." ,".
                      "edits_pending= ".$l_event_series->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_event_series->last_updated)."',".
                      "link_order= ".$l_event_series->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_event_series->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_event_series->entity1_credit)."' ".                      
	          "WHERE id=".$l_event_series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_event_series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_event_series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>