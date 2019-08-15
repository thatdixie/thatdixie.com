<?php
require_once "MusicbrainzDB.php";
require      "L_area_artist.php";

/********************************************************************
 * L_area_artistModel inherits MusicbrainzDB and provides functions to
 * map L_area_artist class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class L_area_artistModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a L_area_artist by id
     *
     * @return l_area_artist
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
	       "FROM l_area_artist ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "L_area_artist"));
    }

    /*********************************************************
     * Insert a new L_area_artist into musicbrainz database
     *
     * @param $l_area_artist
     * @return n/a
     *********************************************************
     */
    public function insert($l_area_artist)
    {
        $query="INSERT INTO l_area_artist ( ".
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
                      " ".$l_area_artist->link." ,".
                      " ".$l_area_artist->entity0." ,".
                      " ".$l_area_artist->entity1." ,".
                      " ".$l_area_artist->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_artist->last_updated)."',".
                      " ".$l_area_artist->link_order." ,".
                      "'".$this->sqlSafe($l_area_artist->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_artist->entity1_credit)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new L_area_artist into musicbrainz database
     * and return a L_area_artist with new autoincrement
     * primary key
     *
     * @param  $l_area_artist
     * @return $l_area_artist
     *********************************************************
     */
    public function insert2($l_area_artist)
    {
        $query="INSERT INTO l_area_artist ( ".
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
                      " ".$l_area_artist->link." ,".
                      " ".$l_area_artist->entity0." ,".
                      " ".$l_area_artist->entity1." ,".
                      " ".$l_area_artist->edits_pending." ,".
                      "'".$this->sqlSafe($l_area_artist->last_updated)."',".
                      " ".$l_area_artist->link_order." ,".
                      "'".$this->sqlSafe($l_area_artist->entity0_credit)."',".
                      "'".$this->sqlSafe($l_area_artist->entity1_credit)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $l_area_artist->id = $id;
	    return($l_area_artist);	
    }


    /*********************************************************
     * Update a L_area_artist in musicbrainz database
     *
     * @param $l_area_artist
     * @return n/a
     *********************************************************
     */
    public function update($l_area_artist)
    {
        $query="UPDATE  l_area_artist ".
	          "SET ".
                      "id= ".$l_area_artist->id." ,".
                      "link= ".$l_area_artist->link." ,".
                      "entity0= ".$l_area_artist->entity0." ,".
                      "entity1= ".$l_area_artist->entity1." ,".
                      "edits_pending= ".$l_area_artist->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($l_area_artist->last_updated)."',".
                      "link_order= ".$l_area_artist->link_order." ,".
                      "entity0_credit='".$this->sqlSafe($l_area_artist->entity0_credit)."',".
                      "entity1_credit='".$this->sqlSafe($l_area_artist->entity1_credit)."' ".                      
	          "WHERE id=".$l_area_artist->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a L_area_artist by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM l_area_artist WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>