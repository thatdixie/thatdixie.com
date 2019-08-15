<?php
require_once "MusicbrainzDB.php";
require      "L_area_series.php";

/********************************************************************
 * L_area_seriesModel inherits MusicbrainzDB and provides functions to
 * map L_area_series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_series by id
     *
     * @return l_area_series
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
	       "FROM l_area_series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_series"));
    }

    /*********************************************************
     * Insert a new L_area_series into musicbrainz database
     *
     * @param $l_area_series
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_series)
    {
        $query="INSERT INTO l_area_series ( ".
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
                      " ".$l_area_series->link." ,".
                      " ".$l_area_series->entity0." ,".
                      " ".$l_area_series->entity1." ,".
                      " ".$l_area_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_series->last_updated)."',".
                      " ".$l_area_series->link_order." ,".
                      "'".$this->sqlSafe($l_area_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_series->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_series into musicbrainz database
     * and return a L_area_series with new autoincrement
     * primary key
     *
     * @param  $l_area_series
     * @return $l_area_series
     *********************************************************
     */
    public function insert2($l_area_series)
    {
        $query="INSERT INTO l_area_series ( ".
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
                      " ".$l_area_series->link." ,".
                      " ".$l_area_series->entity0." ,".
                      " ".$l_area_series->entity1." ,".
                      " ".$l_area_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_series->last_updated)."',".
                      " ".$l_area_series->link_order." ,".
                      "'".$this->sqlSafe($l_area_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_series->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_series->id = $id;
	    return($l_area_series);	
    }


    /*********************************************************
     * Update a L_area_series in musicbrainz database
     *
     * @param $l_area_series
     * @return n/a
     *********************************************************
     */
    public function update($l_area_series)
    {
        $query="UPDATE  l_area_series ".
	          "SET ".
                      "id= ".$l_area_series->id." ,".
                      "link= ".$l_area_series->link." ,".
                      "entity0= ".$l_area_series->entity0." ,".
                      "entity1= ".$l_area_series->entity1." ,".
                      "edits_pending= ".$l_area_series->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_series->last_updated)."',".
                      "link_order= ".$l_area_series->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_series->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_series->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>