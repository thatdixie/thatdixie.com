<?php
require_once "MusicbrainzDB.php";
require      "L_release_series.php";

/********************************************************************
 * L_release_seriesModel inherits MusicbrainzDB and provides functions to
 * map L_release_series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_release_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_release_series by id
     *
     * @return l_release_series
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
	       "FROM l_release_series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_release_series"));
    }

    /*********************************************************
     * Insert a new L_release_series into musicbrainz database
     *
     * @param $l_release_series
     * @return n/a
     *********************************************************
     */
    public function insert($l_release_series)
    {
        $query="INSERT INTO l_release_series ( ".
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
                      " ".$l_release_series->link." ,".
                      " ".$l_release_series->entity0." ,".
                      " ".$l_release_series->entity1." ,".
                      " ".$l_release_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_release_series->last_updated)."',".
                      " ".$l_release_series->link_order." ,".
                      "'".$this->sqlSafe($l_release_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_release_series->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_release_series into musicbrainz database
     * and return a L_release_series with new autoincrement
     * primary key
     *
     * @param  $l_release_series
     * @return $l_release_series
     *********************************************************
     */
    public function insert2($l_release_series)
    {
        $query="INSERT INTO l_release_series ( ".
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
                      " ".$l_release_series->link." ,".
                      " ".$l_release_series->entity0." ,".
                      " ".$l_release_series->entity1." ,".
                      " ".$l_release_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_release_series->last_updated)."',".
                      " ".$l_release_series->link_order." ,".
                      "'".$this->sqlSafe($l_release_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_release_series->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_release_series->id = $id;
	    return($l_release_series);	
    }


    /*********************************************************
     * Update a L_release_series in musicbrainz database
     *
     * @param $l_release_series
     * @return n/a
     *********************************************************
     */
    public function update($l_release_series)
    {
        $query="UPDATE  l_release_series ".
	          "SET ".
                      "id= ".$l_release_series->id." ,".
                      "link= ".$l_release_series->link." ,".
                      "entity0= ".$l_release_series->entity0." ,".
                      "entity1= ".$l_release_series->entity1." ,".
                      "edits_pending= ".$l_release_series->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_release_series->last_updated)."',".
                      "link_order= ".$l_release_series->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_release_series->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_release_series->entity1_credit)."' ".                      
	          "WHERE id=".$l_release_series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_release_series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_release_series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>