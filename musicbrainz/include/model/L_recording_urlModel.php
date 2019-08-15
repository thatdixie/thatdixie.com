<?php
require_once "MusicbrainzDB.php";
require      "L_recording_url.php";

/********************************************************************
 * L_recording_urlModel inherits MusicbrainzDB and provides functions to
 * map L_recording_url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_recording_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_recording_url by id
     *
     * @return l_recording_url
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
	       "FROM l_recording_url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_recording_url"));
    }

    /*********************************************************
     * Insert a new L_recording_url into musicbrainz database
     *
     * @param $l_recording_url
     * @return n/a
     *********************************************************
     */
    public function insert($l_recording_url)
    {
        $query="INSERT INTO l_recording_url ( ".
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
                      " ".$l_recording_url->link." ,".
                      " ".$l_recording_url->entity0." ,".
                      " ".$l_recording_url->entity1." ,".
                      " ".$l_recording_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_recording_url->last_updated)."',".
                      " ".$l_recording_url->link_order." ,".
                      "'".$this->sqlSafe($l_recording_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_recording_url->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_recording_url into musicbrainz database
     * and return a L_recording_url with new autoincrement
     * primary key
     *
     * @param  $l_recording_url
     * @return $l_recording_url
     *********************************************************
     */
    public function insert2($l_recording_url)
    {
        $query="INSERT INTO l_recording_url ( ".
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
                      " ".$l_recording_url->link." ,".
                      " ".$l_recording_url->entity0." ,".
                      " ".$l_recording_url->entity1." ,".
                      " ".$l_recording_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_recording_url->last_updated)."',".
                      " ".$l_recording_url->link_order." ,".
                      "'".$this->sqlSafe($l_recording_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_recording_url->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_recording_url->id = $id;
	    return($l_recording_url);	
    }


    /*********************************************************
     * Update a L_recording_url in musicbrainz database
     *
     * @param $l_recording_url
     * @return n/a
     *********************************************************
     */
    public function update($l_recording_url)
    {
        $query="UPDATE  l_recording_url ".
	          "SET ".
                      "id= ".$l_recording_url->id." ,".
                      "link= ".$l_recording_url->link." ,".
                      "entity0= ".$l_recording_url->entity0." ,".
                      "entity1= ".$l_recording_url->entity1." ,".
                      "edits_pending= ".$l_recording_url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_recording_url->last_updated)."',".
                      "link_order= ".$l_recording_url->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_recording_url->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_recording_url->entity1_credit)."' ".                      
	          "WHERE id=".$l_recording_url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_recording_url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_recording_url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>