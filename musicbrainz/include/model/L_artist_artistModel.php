<?php
require_once "MusicbrainzDB.php";
require      "L_artist_artist.php";

/********************************************************************
 * L_artist_artistModel inherits MusicbrainzDB and provides functions to
 * map L_artist_artist class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_artist_artistModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_artist_artist by id
     *
     * @return l_artist_artist
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
	       "FROM l_artist_artist ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_artist_artist"));
    }

    /*********************************************************
     * Insert a new L_artist_artist into musicbrainz database
     *
     * @param $l_artist_artist
     * @return n/a
     *********************************************************
     */
    public function insert($l_artist_artist)
    {
        $query="INSERT INTO l_artist_artist ( ".
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
                      " ".$l_artist_artist->link." ,".
                      " ".$l_artist_artist->entity0." ,".
                      " ".$l_artist_artist->entity1." ,".
                      " ".$l_artist_artist->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_artist->last_updated)."',".
                      " ".$l_artist_artist->link_order." ,".
                      "'".$this->sqlSafe($l_artist_artist->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_artist->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_artist_artist into musicbrainz database
     * and return a L_artist_artist with new autoincrement
     * primary key
     *
     * @param  $l_artist_artist
     * @return $l_artist_artist
     *********************************************************
     */
    public function insert2($l_artist_artist)
    {
        $query="INSERT INTO l_artist_artist ( ".
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
                      " ".$l_artist_artist->link." ,".
                      " ".$l_artist_artist->entity0." ,".
                      " ".$l_artist_artist->entity1." ,".
                      " ".$l_artist_artist->edits_pending." ,".
                      "'".$this->sqlSafe($l_artist_artist->last_updated)."',".
                      " ".$l_artist_artist->link_order." ,".
                      "'".$this->sqlSafe($l_artist_artist->entity0_credit)."',".
                      "'".$this->sqlSafe($l_artist_artist->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_artist_artist->id = $id;
	    return($l_artist_artist);	
    }


    /*********************************************************
     * Update a L_artist_artist in musicbrainz database
     *
     * @param $l_artist_artist
     * @return n/a
     *********************************************************
     */
    public function update($l_artist_artist)
    {
        $query="UPDATE  l_artist_artist ".
	          "SET ".
                      "id= ".$l_artist_artist->id." ,".
                      "link= ".$l_artist_artist->link." ,".
                      "entity0= ".$l_artist_artist->entity0." ,".
                      "entity1= ".$l_artist_artist->entity1." ,".
                      "edits_pending= ".$l_artist_artist->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_artist_artist->last_updated)."',".
                      "link_order= ".$l_artist_artist->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_artist_artist->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_artist_artist->entity1_credit)."' ".                      
	          "WHERE id=".$l_artist_artist->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_artist_artist by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_artist_artist WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>