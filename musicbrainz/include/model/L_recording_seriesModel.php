<?php
require_once "MusicbrainzDB.php";
require      "L_recording_series.php";

/********************************************************************
 * L_recording_seriesModel inherits MusicbrainzDB and provides functions to
 * map L_recording_series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_recording_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_recording_series by id
     *
     * @return l_recording_series
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
	       "FROM l_recording_series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_recording_series"));
    }

    /*********************************************************
     * Insert a new L_recording_series into musicbrainz database
     *
     * @param $l_recording_series
     * @return n/a
     *********************************************************
     */
    public function insert($l_recording_series)
    {
        $query="INSERT INTO l_recording_series ( ".
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
                      " ".$l_recording_series->link." ,".
                      " ".$l_recording_series->entity0." ,".
                      " ".$l_recording_series->entity1." ,".
                      " ".$l_recording_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_recording_series->last_updated)."',".
                      " ".$l_recording_series->link_order." ,".
                      "'".$this->sqlSafe($l_recording_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_recording_series->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_recording_series into musicbrainz database
     * and return a L_recording_series with new autoincrement
     * primary key
     *
     * @param  $l_recording_series
     * @return $l_recording_series
     *********************************************************
     */
    public function insert2($l_recording_series)
    {
        $query="INSERT INTO l_recording_series ( ".
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
                      " ".$l_recording_series->link." ,".
                      " ".$l_recording_series->entity0." ,".
                      " ".$l_recording_series->entity1." ,".
                      " ".$l_recording_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_recording_series->last_updated)."',".
                      " ".$l_recording_series->link_order." ,".
                      "'".$this->sqlSafe($l_recording_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_recording_series->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_recording_series->id = $id;
	    return($l_recording_series);	
    }


    /*********************************************************
     * Update a L_recording_series in musicbrainz database
     *
     * @param $l_recording_series
     * @return n/a
     *********************************************************
     */
    public function update($l_recording_series)
    {
        $query="UPDATE  l_recording_series ".
	          "SET ".
                      "id= ".$l_recording_series->id." ,".
                      "link= ".$l_recording_series->link." ,".
                      "entity0= ".$l_recording_series->entity0." ,".
                      "entity1= ".$l_recording_series->entity1." ,".
                      "edits_pending= ".$l_recording_series->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_recording_series->last_updated)."',".
                      "link_order= ".$l_recording_series->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_recording_series->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_recording_series->entity1_credit)."' ".                      
	          "WHERE id=".$l_recording_series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_recording_series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_recording_series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>