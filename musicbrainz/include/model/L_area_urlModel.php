<?php
require_once "MusicbrainzDB.php";
require      "L_area_url.php";

/********************************************************************
 * L_area_urlModel inherits MusicbrainzDB and provides functions to
 * map L_area_url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_url by id
     *
     * @return l_area_url
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
	       "FROM l_area_url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_url"));
    }

    /*********************************************************
     * Insert a new L_area_url into musicbrainz database
     *
     * @param $l_area_url
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_url)
    {
        $query="INSERT INTO l_area_url ( ".
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
                      " ".$l_area_url->link." ,".
                      " ".$l_area_url->entity0." ,".
                      " ".$l_area_url->entity1." ,".
                      " ".$l_area_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_url->last_updated)."',".
                      " ".$l_area_url->link_order." ,".
                      "'".$this->sqlSafe($l_area_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_url->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_url into musicbrainz database
     * and return a L_area_url with new autoincrement
     * primary key
     *
     * @param  $l_area_url
     * @return $l_area_url
     *********************************************************
     */
    public function insert2($l_area_url)
    {
        $query="INSERT INTO l_area_url ( ".
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
                      " ".$l_area_url->link." ,".
                      " ".$l_area_url->entity0." ,".
                      " ".$l_area_url->entity1." ,".
                      " ".$l_area_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_url->last_updated)."',".
                      " ".$l_area_url->link_order." ,".
                      "'".$this->sqlSafe($l_area_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_url->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_url->id = $id;
	    return($l_area_url);	
    }


    /*********************************************************
     * Update a L_area_url in musicbrainz database
     *
     * @param $l_area_url
     * @return n/a
     *********************************************************
     */
    public function update($l_area_url)
    {
        $query="UPDATE  l_area_url ".
	          "SET ".
                      "id= ".$l_area_url->id." ,".
                      "link= ".$l_area_url->link." ,".
                      "entity0= ".$l_area_url->entity0." ,".
                      "entity1= ".$l_area_url->entity1." ,".
                      "edits_pending= ".$l_area_url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_url->last_updated)."',".
                      "link_order= ".$l_area_url->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_url->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_url->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>