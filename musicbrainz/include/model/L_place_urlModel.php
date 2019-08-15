<?php
require_once "MusicbrainzDB.php";
require      "L_place_url.php";

/********************************************************************
 * L_place_urlModel inherits MusicbrainzDB and provides functions to
 * map L_place_url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_place_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_place_url by id
     *
     * @return l_place_url
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
	       "FROM l_place_url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_place_url"));
    }

    /*********************************************************
     * Insert a new L_place_url into musicbrainz database
     *
     * @param $l_place_url
     * @return n/a
     *********************************************************
     */
    public function insert($l_place_url)
    {
        $query="INSERT INTO l_place_url ( ".
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
                      " ".$l_place_url->link." ,".
                      " ".$l_place_url->entity0." ,".
                      " ".$l_place_url->entity1." ,".
                      " ".$l_place_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_url->last_updated)."',".
                      " ".$l_place_url->link_order." ,".
                      "'".$this->sqlSafe($l_place_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_url->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_place_url into musicbrainz database
     * and return a L_place_url with new autoincrement
     * primary key
     *
     * @param  $l_place_url
     * @return $l_place_url
     *********************************************************
     */
    public function insert2($l_place_url)
    {
        $query="INSERT INTO l_place_url ( ".
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
                      " ".$l_place_url->link." ,".
                      " ".$l_place_url->entity0." ,".
                      " ".$l_place_url->entity1." ,".
                      " ".$l_place_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_place_url->last_updated)."',".
                      " ".$l_place_url->link_order." ,".
                      "'".$this->sqlSafe($l_place_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_place_url->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_place_url->id = $id;
	    return($l_place_url);	
    }


    /*********************************************************
     * Update a L_place_url in musicbrainz database
     *
     * @param $l_place_url
     * @return n/a
     *********************************************************
     */
    public function update($l_place_url)
    {
        $query="UPDATE  l_place_url ".
	          "SET ".
                      "id= ".$l_place_url->id." ,".
                      "link= ".$l_place_url->link." ,".
                      "entity0= ".$l_place_url->entity0." ,".
                      "entity1= ".$l_place_url->entity1." ,".
                      "edits_pending= ".$l_place_url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_place_url->last_updated)."',".
                      "link_order= ".$l_place_url->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_place_url->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_place_url->entity1_credit)."' ".                      
	          "WHERE id=".$l_place_url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_place_url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_place_url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>