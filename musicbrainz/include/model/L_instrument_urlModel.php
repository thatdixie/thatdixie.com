<?php
require_once "MusicbrainzDB.php";
require      "L_instrument_url.php";

/********************************************************************
 * L_instrument_urlModel inherits MusicbrainzDB and provides functions to
 * map L_instrument_url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_instrument_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_instrument_url by id
     *
     * @return l_instrument_url
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
	       "FROM l_instrument_url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_instrument_url"));
    }

    /*********************************************************
     * Insert a new L_instrument_url into musicbrainz database
     *
     * @param $l_instrument_url
     * @return n/a
     *********************************************************
     */
    public function insert($l_instrument_url)
    {
        $query="INSERT INTO l_instrument_url ( ".
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
                      " ".$l_instrument_url->link." ,".
                      " ".$l_instrument_url->entity0." ,".
                      " ".$l_instrument_url->entity1." ,".
                      " ".$l_instrument_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_url->last_updated)."',".
                      " ".$l_instrument_url->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_url->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_instrument_url into musicbrainz database
     * and return a L_instrument_url with new autoincrement
     * primary key
     *
     * @param  $l_instrument_url
     * @return $l_instrument_url
     *********************************************************
     */
    public function insert2($l_instrument_url)
    {
        $query="INSERT INTO l_instrument_url ( ".
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
                      " ".$l_instrument_url->link." ,".
                      " ".$l_instrument_url->entity0." ,".
                      " ".$l_instrument_url->entity1." ,".
                      " ".$l_instrument_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_instrument_url->last_updated)."',".
                      " ".$l_instrument_url->link_order." ,".
                      "'".$this->sqlSafe($l_instrument_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_instrument_url->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_instrument_url->id = $id;
	    return($l_instrument_url);	
    }


    /*********************************************************
     * Update a L_instrument_url in musicbrainz database
     *
     * @param $l_instrument_url
     * @return n/a
     *********************************************************
     */
    public function update($l_instrument_url)
    {
        $query="UPDATE  l_instrument_url ".
	          "SET ".
                      "id= ".$l_instrument_url->id." ,".
                      "link= ".$l_instrument_url->link." ,".
                      "entity0= ".$l_instrument_url->entity0." ,".
                      "entity1= ".$l_instrument_url->entity1." ,".
                      "edits_pending= ".$l_instrument_url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_instrument_url->last_updated)."',".
                      "link_order= ".$l_instrument_url->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_instrument_url->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_instrument_url->entity1_credit)."' ".                      
	          "WHERE id=".$l_instrument_url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_instrument_url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_instrument_url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>