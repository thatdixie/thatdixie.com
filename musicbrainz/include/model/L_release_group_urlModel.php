<?php
require_once "MusicbrainzDB.php";
require      "L_release_group_url.php";

/********************************************************************
 * L_release_group_urlModel inherits MusicbrainzDB and provides functions to
 * map L_release_group_url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_release_group_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_release_group_url by id
     *
     * @return l_release_group_url
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
	       "FROM l_release_group_url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_release_group_url"));
    }

    /*********************************************************
     * Insert a new L_release_group_url into musicbrainz database
     *
     * @param $l_release_group_url
     * @return n/a
     *********************************************************
     */
    public function insert($l_release_group_url)
    {
        $query="INSERT INTO l_release_group_url ( ".
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
                      " ".$l_release_group_url->link." ,".
                      " ".$l_release_group_url->entity0." ,".
                      " ".$l_release_group_url->entity1." ,".
                      " ".$l_release_group_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_release_group_url->last_updated)."',".
                      " ".$l_release_group_url->link_order." ,".
                      "'".$this->sqlSafe($l_release_group_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_release_group_url->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_release_group_url into musicbrainz database
     * and return a L_release_group_url with new autoincrement
     * primary key
     *
     * @param  $l_release_group_url
     * @return $l_release_group_url
     *********************************************************
     */
    public function insert2($l_release_group_url)
    {
        $query="INSERT INTO l_release_group_url ( ".
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
                      " ".$l_release_group_url->link." ,".
                      " ".$l_release_group_url->entity0." ,".
                      " ".$l_release_group_url->entity1." ,".
                      " ".$l_release_group_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_release_group_url->last_updated)."',".
                      " ".$l_release_group_url->link_order." ,".
                      "'".$this->sqlSafe($l_release_group_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_release_group_url->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_release_group_url->id = $id;
	    return($l_release_group_url);	
    }


    /*********************************************************
     * Update a L_release_group_url in musicbrainz database
     *
     * @param $l_release_group_url
     * @return n/a
     *********************************************************
     */
    public function update($l_release_group_url)
    {
        $query="UPDATE  l_release_group_url ".
	          "SET ".
                      "id= ".$l_release_group_url->id." ,".
                      "link= ".$l_release_group_url->link." ,".
                      "entity0= ".$l_release_group_url->entity0." ,".
                      "entity1= ".$l_release_group_url->entity1." ,".
                      "edits_pending= ".$l_release_group_url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_release_group_url->last_updated)."',".
                      "link_order= ".$l_release_group_url->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_release_group_url->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_release_group_url->entity1_credit)."' ".                      
	          "WHERE id=".$l_release_group_url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_release_group_url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_release_group_url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>