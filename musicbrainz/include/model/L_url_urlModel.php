<?php
require_once "MusicbrainzDB.php";
require      "L_url_url.php";

/********************************************************************
 * L_url_urlModel inherits MusicbrainzDB and provides functions to
 * map L_url_url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_url_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_url_url by id
     *
     * @return l_url_url
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
	       "FROM l_url_url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_url_url"));
    }

    /*********************************************************
     * Insert a new L_url_url into musicbrainz database
     *
     * @param $l_url_url
     * @return n/a
     *********************************************************
     */
    public function insert($l_url_url)
    {
        $query="INSERT INTO l_url_url ( ".
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
                      " ".$l_url_url->link." ,".
                      " ".$l_url_url->entity0." ,".
                      " ".$l_url_url->entity1." ,".
                      " ".$l_url_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_url_url->last_updated)."',".
                      " ".$l_url_url->link_order." ,".
                      "'".$this->sqlSafe($l_url_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_url_url->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_url_url into musicbrainz database
     * and return a L_url_url with new autoincrement
     * primary key
     *
     * @param  $l_url_url
     * @return $l_url_url
     *********************************************************
     */
    public function insert2($l_url_url)
    {
        $query="INSERT INTO l_url_url ( ".
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
                      " ".$l_url_url->link." ,".
                      " ".$l_url_url->entity0." ,".
                      " ".$l_url_url->entity1." ,".
                      " ".$l_url_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_url_url->last_updated)."',".
                      " ".$l_url_url->link_order." ,".
                      "'".$this->sqlSafe($l_url_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_url_url->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_url_url->id = $id;
	    return($l_url_url);	
    }


    /*********************************************************
     * Update a L_url_url in musicbrainz database
     *
     * @param $l_url_url
     * @return n/a
     *********************************************************
     */
    public function update($l_url_url)
    {
        $query="UPDATE  l_url_url ".
	          "SET ".
                      "id= ".$l_url_url->id." ,".
                      "link= ".$l_url_url->link." ,".
                      "entity0= ".$l_url_url->entity0." ,".
                      "entity1= ".$l_url_url->entity1." ,".
                      "edits_pending= ".$l_url_url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_url_url->last_updated)."',".
                      "link_order= ".$l_url_url->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_url_url->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_url_url->entity1_credit)."' ".                      
	          "WHERE id=".$l_url_url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_url_url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_url_url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>