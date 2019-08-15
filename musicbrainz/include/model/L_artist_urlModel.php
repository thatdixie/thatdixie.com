<?php
require_once "MusicbrainzDB.php";
require      "L_artist_url.php";

/********************************************************************
 * L_artist_urlModel inherits MusicbrainzDB and provides functions to
 * map L_artist_url class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_artist_urlModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_artist_url by id
     *
     * @return l_artist_url
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
	       "FROM l_artist_url ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_artist_url"));
    }

    /*********************************************************
     * Insert a new L_artist_url into musicbrainz database
     *
     * @param $l_artist_url
     * @return n/a
     *********************************************************
     */
    public function insert($l_artist_url)
    {
        $query="INSERT INTO l_artist_url ( ".
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
                      " ".$l_artist_url->link." ,".
                      " ".$l_artist_url->entity0." ,".
                      " ".$l_artist_url->entity1." ,".
                      " ".$l_artist_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_url->last_updated)."',".
                      " ".$l_artist_url->link_order." ,".
                      "'".$this->sqlSafe($l_artist_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_url->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_artist_url into musicbrainz database
     * and return a L_artist_url with new autoincrement
     * primary key
     *
     * @param  $l_artist_url
     * @return $l_artist_url
     *********************************************************
     */
    public function insert2($l_artist_url)
    {
        $query="INSERT INTO l_artist_url ( ".
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
                      " ".$l_artist_url->link." ,".
                      " ".$l_artist_url->entity0." ,".
                      " ".$l_artist_url->entity1." ,".
                      " ".$l_artist_url->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_url->last_updated)."',".
                      " ".$l_artist_url->link_order." ,".
                      "'".$this->sqlSafe($l_artist_url->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_url->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_artist_url->id = $id;
	    return($l_artist_url);	
    }


    /*********************************************************
     * Update a L_artist_url in musicbrainz database
     *
     * @param $l_artist_url
     * @return n/a
     *********************************************************
     */
    public function update($l_artist_url)
    {
        $query="UPDATE  l_artist_url ".
	          "SET ".
                      "id= ".$l_artist_url->id." ,".
                      "link= ".$l_artist_url->link." ,".
                      "entity0= ".$l_artist_url->entity0." ,".
                      "entity1= ".$l_artist_url->entity1." ,".
                      "edits_pending= ".$l_artist_url->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_artist_url->last_updated)."',".
                      "link_order= ".$l_artist_url->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_artist_url->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_artist_url->entity1_credit)."' ".                      
	          "WHERE id=".$l_artist_url->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_artist_url by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_artist_url WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>