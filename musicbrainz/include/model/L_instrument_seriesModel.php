<?php
require_once "MusicbrainzDB.php";
require      "L_instrument_series.php";

/********************************************************************
 * L_instrument_seriesModel inherits MusicbrainzDB and provides functions to
 * map L_instrument_series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_instrument_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_instrument_series by id
     *
     * @return l_instrument_series
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
	       "FROM l_instrument_series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_instrument_series"));
    }

    /*********************************************************
     * Insert a new L_instrument_series into musicbrainz database
     *
     * @param $l_instrument_series
     * @return n/a
     *********************************************************
     */
    public function insert($l_instrument_series)
    {
        $query="INSERT INTO l_instrument_series ( ".
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
                      " ".$l_instrument_series->link." ,".
                      " ".$l_instrument_series->entity0." ,".
                      " ".$l_instrument_series->entity1." ,".
                      " ".$l_instrument_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_series->last_updated)."',".
                      " ".$l_instrument_series->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_series->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_instrument_series into musicbrainz database
     * and return a L_instrument_series with new autoincrement
     * primary key
     *
     * @param  $l_instrument_series
     * @return $l_instrument_series
     *********************************************************
     */
    public function insert2($l_instrument_series)
    {
        $query="INSERT INTO l_instrument_series ( ".
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
                      " ".$l_instrument_series->link." ,".
                      " ".$l_instrument_series->entity0." ,".
                      " ".$l_instrument_series->entity1." ,".
                      " ".$l_instrument_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_series->last_updated)."',".
                      " ".$l_instrument_series->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_series->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_instrument_series->id = $id;
	    return($l_instrument_series);	
    }


    /*********************************************************
     * Update a L_instrument_series in musicbrainz database
     *
     * @param $l_instrument_series
     * @return n/a
     *********************************************************
     */
    public function update($l_instrument_series)
    {
        $query="UPDATE  l_instrument_series ".
	          "SET ".
                      "id= ".$l_instrument_series->id." ,".
                      "link= ".$l_instrument_series->link." ,".
                      "entity0= ".$l_instrument_series->entity0." ,".
                      "entity1= ".$l_instrument_series->entity1." ,".
                      "edits_pending= ".$l_instrument_series->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_instrument_series->last_updated)."',".
                      "link_order= ".$l_instrument_series->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_instrument_series->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_instrument_series->entity1_credit)."' ".                      
	          "WHERE id=".$l_instrument_series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_instrument_series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_instrument_series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>