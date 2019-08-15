<?php
require_once "MusicbrainzDB.php";
require      "L_place_series.php";

/********************************************************************
 * L_place_seriesModel inherits MusicbrainzDB and provides functions to
 * map L_place_series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_place_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_place_series by id
     *
     * @return l_place_series
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
	       "FROM l_place_series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_place_series"));
    }

    /*********************************************************
     * Insert a new L_place_series into musicbrainz database
     *
     * @param $l_place_series
     * @return n/a
     *********************************************************
     */
    public function insert($l_place_series)
    {
        $query="INSERT INTO l_place_series ( ".
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
                      " ".$l_place_series->link." ,".
                      " ".$l_place_series->entity0." ,".
                      " ".$l_place_series->entity1." ,".
                      " ".$l_place_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_series->last_updated)."',".
                      " ".$l_place_series->link_order." ,".
                      "'".$this->sqlSafe($l_place_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_series->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_place_series into musicbrainz database
     * and return a L_place_series with new autoincrement
     * primary key
     *
     * @param  $l_place_series
     * @return $l_place_series
     *********************************************************
     */
    public function insert2($l_place_series)
    {
        $query="INSERT INTO l_place_series ( ".
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
                      " ".$l_place_series->link." ,".
                      " ".$l_place_series->entity0." ,".
                      " ".$l_place_series->entity1." ,".
                      " ".$l_place_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_series->last_updated)."',".
                      " ".$l_place_series->link_order." ,".
                      "'".$this->sqlSafe($l_place_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_series->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_place_series->id = $id;
	    return($l_place_series);	
    }


    /*********************************************************
     * Update a L_place_series in musicbrainz database
     *
     * @param $l_place_series
     * @return n/a
     *********************************************************
     */
    public function update($l_place_series)
    {
        $query="UPDATE  l_place_series ".
	          "SET ".
                      "id= ".$l_place_series->id." ,".
                      "link= ".$l_place_series->link." ,".
                      "entity0= ".$l_place_series->entity0." ,".
                      "entity1= ".$l_place_series->entity1." ,".
                      "edits_pending= ".$l_place_series->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_place_series->last_updated)."',".
                      "link_order= ".$l_place_series->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_place_series->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_place_series->entity1_credit)."' ".                      
	          "WHERE id=".$l_place_series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_place_series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_place_series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>