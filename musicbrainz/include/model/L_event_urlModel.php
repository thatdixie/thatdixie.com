<?php
require_once "MusicbrainzDB.php";
require      "L_event_url.php";

/********************************************************************
 * L_event_urlModel inherits MusicbrainzDB and provides functions to
 * map L_event_url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_event_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_event_url by id
     *
     * @return l_event_url
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
	       "FROM l_event_url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_event_url"));
    }

    /*********************************************************
     * Insert a new L_event_url into musicbrainz database
     *
     * @param $l_event_url
     * @return n/a
     *********************************************************
     */
    public function insert($l_event_url)
    {
        $query="INSERT INTO l_event_url ( ".
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
                      " ".$l_event_url->link." ,".
                      " ".$l_event_url->entity0." ,".
                      " ".$l_event_url->entity1." ,".
                      " ".$l_event_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_url->last_updated)."',".
                      " ".$l_event_url->link_order." ,".
                      "'".$this->sqlSafe($l_event_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_url->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_event_url into musicbrainz database
     * and return a L_event_url with new autoincrement
     * primary key
     *
     * @param  $l_event_url
     * @return $l_event_url
     *********************************************************
     */
    public function insert2($l_event_url)
    {
        $query="INSERT INTO l_event_url ( ".
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
                      " ".$l_event_url->link." ,".
                      " ".$l_event_url->entity0." ,".
                      " ".$l_event_url->entity1." ,".
                      " ".$l_event_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_event_url->last_updated)."',".
                      " ".$l_event_url->link_order." ,".
                      "'".$this->sqlSafe($l_event_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_event_url->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_event_url->id = $id;
	    return($l_event_url);	
    }


    /*********************************************************
     * Update a L_event_url in musicbrainz database
     *
     * @param $l_event_url
     * @return n/a
     *********************************************************
     */
    public function update($l_event_url)
    {
        $query="UPDATE  l_event_url ".
	          "SET ".
                      "id= ".$l_event_url->id." ,".
                      "link= ".$l_event_url->link." ,".
                      "entity0= ".$l_event_url->entity0." ,".
                      "entity1= ".$l_event_url->entity1." ,".
                      "edits_pending= ".$l_event_url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_event_url->last_updated)."',".
                      "link_order= ".$l_event_url->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_event_url->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_event_url->entity1_credit)."' ".                      
	          "WHERE id=".$l_event_url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_event_url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_event_url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>