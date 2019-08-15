<?php
require_once "MusicbrainzDB.php";
require      "L_series_url.php";

/********************************************************************
 * L_series_urlModel inherits MusicbrainzDB and provides functions to
 * map L_series_url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_series_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_series_url by id
     *
     * @return l_series_url
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
	       "FROM l_series_url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_series_url"));
    }

    /*********************************************************
     * Insert a new L_series_url into musicbrainz database
     *
     * @param $l_series_url
     * @return n/a
     *********************************************************
     */
    public function insert($l_series_url)
    {
        $query="INSERT INTO l_series_url ( ".
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
                      " ".$l_series_url->link." ,".
                      " ".$l_series_url->entity0." ,".
                      " ".$l_series_url->entity1." ,".
                      " ".$l_series_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_series_url->last_updated)."',".
                      " ".$l_series_url->link_order." ,".
                      "'".$this->sqlSafe($l_series_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_series_url->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_series_url into musicbrainz database
     * and return a L_series_url with new autoincrement
     * primary key
     *
     * @param  $l_series_url
     * @return $l_series_url
     *********************************************************
     */
    public function insert2($l_series_url)
    {
        $query="INSERT INTO l_series_url ( ".
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
                      " ".$l_series_url->link." ,".
                      " ".$l_series_url->entity0." ,".
                      " ".$l_series_url->entity1." ,".
                      " ".$l_series_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_series_url->last_updated)."',".
                      " ".$l_series_url->link_order." ,".
                      "'".$this->sqlSafe($l_series_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_series_url->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_series_url->id = $id;
	    return($l_series_url);	
    }


    /*********************************************************
     * Update a L_series_url in musicbrainz database
     *
     * @param $l_series_url
     * @return n/a
     *********************************************************
     */
    public function update($l_series_url)
    {
        $query="UPDATE  l_series_url ".
	          "SET ".
                      "id= ".$l_series_url->id." ,".
                      "link= ".$l_series_url->link." ,".
                      "entity0= ".$l_series_url->entity0." ,".
                      "entity1= ".$l_series_url->entity1." ,".
                      "edits_pending= ".$l_series_url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_series_url->last_updated)."',".
                      "link_order= ".$l_series_url->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_series_url->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_series_url->entity1_credit)."' ".                      
	          "WHERE id=".$l_series_url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_series_url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_series_url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>