<?php
require_once "MusicbrainzDB.php";
require      "L_series_series.php";

/********************************************************************
 * L_series_seriesModel inherits MusicbrainzDB and provides functions to
 * map L_series_series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_series_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_series_series by id
     *
     * @return l_series_series
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
	       "FROM l_series_series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_series_series"));
    }

    /*********************************************************
     * Insert a new L_series_series into musicbrainz database
     *
     * @param $l_series_series
     * @return n/a
     *********************************************************
     */
    public function insert($l_series_series)
    {
        $query="INSERT INTO l_series_series ( ".
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
                      " ".$l_series_series->link." ,".
                      " ".$l_series_series->entity0." ,".
                      " ".$l_series_series->entity1." ,".
                      " ".$l_series_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_series_series->last_updated)."',".
                      " ".$l_series_series->link_order." ,".
                      "'".$this->sqlSafe($l_series_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_series_series->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_series_series into musicbrainz database
     * and return a L_series_series with new autoincrement
     * primary key
     *
     * @param  $l_series_series
     * @return $l_series_series
     *********************************************************
     */
    public function insert2($l_series_series)
    {
        $query="INSERT INTO l_series_series ( ".
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
                      " ".$l_series_series->link." ,".
                      " ".$l_series_series->entity0." ,".
                      " ".$l_series_series->entity1." ,".
                      " ".$l_series_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_series_series->last_updated)."',".
                      " ".$l_series_series->link_order." ,".
                      "'".$this->sqlSafe($l_series_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_series_series->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_series_series->id = $id;
	    return($l_series_series);	
    }


    /*********************************************************
     * Update a L_series_series in musicbrainz database
     *
     * @param $l_series_series
     * @return n/a
     *********************************************************
     */
    public function update($l_series_series)
    {
        $query="UPDATE  l_series_series ".
	          "SET ".
                      "id= ".$l_series_series->id." ,".
                      "link= ".$l_series_series->link." ,".
                      "entity0= ".$l_series_series->entity0." ,".
                      "entity1= ".$l_series_series->entity1." ,".
                      "edits_pending= ".$l_series_series->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_series_series->last_updated)."',".
                      "link_order= ".$l_series_series->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_series_series->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_series_series->entity1_credit)."' ".                      
	          "WHERE id=".$l_series_series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_series_series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_series_series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>