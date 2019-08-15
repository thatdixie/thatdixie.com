<?php
require_once "MusicbrainzDB.php";
require      "Place.php";

/********************************************************************
 * PlaceModel inherits MusicbrainzDB and provides functions to
 * map Place class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class PlaceModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Place by id
     *
     * @return place
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "name,".
                      "type,".
                      "address,".
                      "area,".
                      "coordinates,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "ended ".                      		               
	       "FROM place ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Place"));
    }

    /*********************************************************
     * Insert a new Place into musicbrainz database
     *
     * @param $place
     * @return n/a
     *********************************************************
     */
    public function insert($place)
    {
        $query="INSERT INTO place ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "type,".
                      "address,".
                      "area,".
                      "coordinates,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($place->gid)."',".
                      "'".$this->sqlSafe($place->name)."',".
                      " ".$place->type." ,".
                      "'".$this->sqlSafe($place->address)."',".
                      " ".$place->area." ,".
                      "'".$this->sqlSafe($place->coordinates)."',".
                      "'".$this->sqlSafe($place->comment)."',".
                      " ".$place->edits_pending." ,".
                      "'".$this->sqlSafe($place->last_updated)."',".
                      " ".$place->begin_date_year." ,".
                      " ".$place->begin_date_month." ,".
                      " ".$place->begin_date_day." ,".
                      " ".$place->end_date_year." ,".
                      " ".$place->end_date_month." ,".
                      " ".$place->end_date_day." ,".
                      "'".$this->sqlSafe($place->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Place into musicbrainz database
     * and return a Place with new autoincrement
     * primary key
     *
     * @param  $place
     * @return $place
     *********************************************************
     */
    public function insert2($place)
    {
        $query="INSERT INTO place ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "type,".
                      "address,".
                      "area,".
                      "coordinates,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($place->gid)."',".
                      "'".$this->sqlSafe($place->name)."',".
                      " ".$place->type." ,".
                      "'".$this->sqlSafe($place->address)."',".
                      " ".$place->area." ,".
                      "'".$this->sqlSafe($place->coordinates)."',".
                      "'".$this->sqlSafe($place->comment)."',".
                      " ".$place->edits_pending." ,".
                      "'".$this->sqlSafe($place->last_updated)."',".
                      " ".$place->begin_date_year." ,".
                      " ".$place->begin_date_month." ,".
                      " ".$place->begin_date_day." ,".
                      " ".$place->end_date_year." ,".
                      " ".$place->end_date_month." ,".
                      " ".$place->end_date_day." ,".
                      "'".$this->sqlSafe($place->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $place->id = $id;
	    return($place);	
    }


    /*********************************************************
     * Update a Place in musicbrainz database
     *
     * @param $place
     * @return n/a
     *********************************************************
     */
    public function update($place)
    {
        $query="UPDATE  place ".
	          "SET ".
                      "id= ".$place->id." ,".
                      "gid='".$this->sqlSafe($place->gid)."',".
                      "name='".$this->sqlSafe($place->name)."',".
                      "type= ".$place->type." ,".
                      "address='".$this->sqlSafe($place->address)."',".
                      "area= ".$place->area." ,".
                      "coordinates='".$this->sqlSafe($place->coordinates)."',".
                      "comment='".$this->sqlSafe($place->comment)."',".
                      "edits_pending= ".$place->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($place->last_updated)."',".
                      "begin_date_year= ".$place->begin_date_year." ,".
                      "begin_date_month= ".$place->begin_date_month." ,".
                      "begin_date_day= ".$place->begin_date_day." ,".
                      "end_date_year= ".$place->end_date_year." ,".
                      "end_date_month= ".$place->end_date_month." ,".
                      "end_date_day= ".$place->end_date_day." ,".
                      "ended='".$this->sqlSafe($place->ended)."' ".                      
	          "WHERE id=".$place->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Place by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM place WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>