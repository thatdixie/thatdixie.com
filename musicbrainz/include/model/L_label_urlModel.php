<?php
require_once "MusicbrainzDB.php";
require      "L_label_url.php";

/********************************************************************
 * L_label_urlModel inherits MusicbrainzDB and provides functions to
 * map L_label_url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_label_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_label_url by id
     *
     * @return l_label_url
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
	       "FROM l_label_url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_label_url"));
    }

    /*********************************************************
     * Insert a new L_label_url into musicbrainz database
     *
     * @param $l_label_url
     * @return n/a
     *********************************************************
     */
    public function insert($l_label_url)
    {
        $query="INSERT INTO l_label_url ( ".
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
                      " ".$l_label_url->link." ,".
                      " ".$l_label_url->entity0." ,".
                      " ".$l_label_url->entity1." ,".
                      " ".$l_label_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_url->last_updated)."',".
                      " ".$l_label_url->link_order." ,".
                      "'".$this->sqlSafe($l_label_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_url->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_label_url into musicbrainz database
     * and return a L_label_url with new autoincrement
     * primary key
     *
     * @param  $l_label_url
     * @return $l_label_url
     *********************************************************
     */
    public function insert2($l_label_url)
    {
        $query="INSERT INTO l_label_url ( ".
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
                      " ".$l_label_url->link." ,".
                      " ".$l_label_url->entity0." ,".
                      " ".$l_label_url->entity1." ,".
                      " ".$l_label_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_label_url->last_updated)."',".
                      " ".$l_label_url->link_order." ,".
                      "'".$this->sqlSafe($l_label_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_label_url->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_label_url->id = $id;
	    return($l_label_url);	
    }


    /*********************************************************
     * Update a L_label_url in musicbrainz database
     *
     * @param $l_label_url
     * @return n/a
     *********************************************************
     */
    public function update($l_label_url)
    {
        $query="UPDATE  l_label_url ".
	          "SET ".
                      "id= ".$l_label_url->id." ,".
                      "link= ".$l_label_url->link." ,".
                      "entity0= ".$l_label_url->entity0." ,".
                      "entity1= ".$l_label_url->entity1." ,".
                      "edits_pending= ".$l_label_url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_label_url->last_updated)."',".
                      "link_order= ".$l_label_url->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_label_url->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_label_url->entity1_credit)."' ".                      
	          "WHERE id=".$l_label_url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_label_url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_label_url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>