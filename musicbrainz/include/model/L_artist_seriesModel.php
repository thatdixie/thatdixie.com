<?php
require_once "MusicbrainzDB.php";
require      "L_artist_series.php";

/********************************************************************
 * L_artist_seriesModel inherits MusicbrainzDB and provides functions to
 * map L_artist_series class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_artist_seriesModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_artist_series by id
     *
     * @return l_artist_series
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
	       "FROM l_artist_series ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_artist_series"));
    }

    /*********************************************************
     * Insert a new L_artist_series into musicbrainz database
     *
     * @param $l_artist_series
     * @return n/a
     *********************************************************
     */
    public function insert($l_artist_series)
    {
        $query="INSERT INTO l_artist_series ( ".
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
                      " ".$l_artist_series->link." ,".
                      " ".$l_artist_series->entity0." ,".
                      " ".$l_artist_series->entity1." ,".
                      " ".$l_artist_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_series->last_updated)."',".
                      " ".$l_artist_series->link_order." ,".
                      "'".$this->sqlSafe($l_artist_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_series->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_artist_series into musicbrainz database
     * and return a L_artist_series with new autoincrement
     * primary key
     *
     * @param  $l_artist_series
     * @return $l_artist_series
     *********************************************************
     */
    public function insert2($l_artist_series)
    {
        $query="INSERT INTO l_artist_series ( ".
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
                      " ".$l_artist_series->link." ,".
                      " ".$l_artist_series->entity0." ,".
                      " ".$l_artist_series->entity1." ,".
                      " ".$l_artist_series->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_series->last_updated)."',".
                      " ".$l_artist_series->link_order." ,".
                      "'".$this->sqlSafe($l_artist_series->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_series->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_artist_series->id = $id;
	    return($l_artist_series);	
    }


    /*********************************************************
     * Update a L_artist_series in musicbrainz database
     *
     * @param $l_artist_series
     * @return n/a
     *********************************************************
     */
    public function update($l_artist_series)
    {
        $query="UPDATE  l_artist_series ".
	          "SET ".
                      "id= ".$l_artist_series->id." ,".
                      "link= ".$l_artist_series->link." ,".
                      "entity0= ".$l_artist_series->entity0." ,".
                      "entity1= ".$l_artist_series->entity1." ,".
                      "edits_pending= ".$l_artist_series->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_artist_series->last_updated)."',".
                      "link_order= ".$l_artist_series->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_artist_series->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_artist_series->entity1_credit)."' ".                      
	          "WHERE id=".$l_artist_series->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_artist_series by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_artist_series WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>