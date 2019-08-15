<?php
require_once "MusicbrainzDB.php";
require      "Artist.php";

/********************************************************************
 * ArtistModel inherits MusicbrainzDB and provides functions to
 * map Artist class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class ArtistModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Artist by id
     *
     * @return artist
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "name,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "type,".
                      "area,".
                      "gender,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "ended,".
                      "begin_area,".
                      "end_area ".                      		               
	       "FROM artist ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Artist"));
    }

    /*********************************************************
     * Insert a new Artist into musicbrainz database
     *
     * @param $artist
     * @return n/a
     *********************************************************
     */
    public function insert($artist)
    {
        $query="INSERT INTO artist ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "type,".
                      "area,".
                      "gender,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "ended,".
                      "begin_area,".
                      "end_area ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($artist->gid)."',".
                      "'".$this->sqlSafe($artist->name)."',".
                      "'".$this->sqlSafe($artist->sort_name)."',".
                      " ".$artist->begin_date_year." ,".
                      " ".$artist->begin_date_month." ,".
                      " ".$artist->begin_date_day." ,".
                      " ".$artist->end_date_year." ,".
                      " ".$artist->end_date_month." ,".
                      " ".$artist->end_date_day." ,".
                      " ".$artist->type." ,".
                      " ".$artist->area." ,".
                      " ".$artist->gender." ,".
                      "'".$this->sqlSafe($artist->comment)."',".
                      " ".$artist->edits_pending." ,".
                      "'".$this->sqlSafe($artist->last_updated)."',".
                      "'".$this->sqlSafe($artist->ended)."',".
                      " ".$artist->begin_area." ,".
                      " ".$artist->end_area."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Artist into musicbrainz database
     * and return a Artist with new autoincrement
     * primary key
     *
     * @param  $artist
     * @return $artist
     *********************************************************
     */
    public function insert2($artist)
    {
        $query="INSERT INTO artist ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "type,".
                      "area,".
                      "gender,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "ended,".
                      "begin_area,".
                      "end_area ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($artist->gid)."',".
                      "'".$this->sqlSafe($artist->name)."',".
                      "'".$this->sqlSafe($artist->sort_name)."',".
                      " ".$artist->begin_date_year." ,".
                      " ".$artist->begin_date_month." ,".
                      " ".$artist->begin_date_day." ,".
                      " ".$artist->end_date_year." ,".
                      " ".$artist->end_date_month." ,".
                      " ".$artist->end_date_day." ,".
                      " ".$artist->type." ,".
                      " ".$artist->area." ,".
                      " ".$artist->gender." ,".
                      "'".$this->sqlSafe($artist->comment)."',".
                      " ".$artist->edits_pending." ,".
                      "'".$this->sqlSafe($artist->last_updated)."',".
                      "'".$this->sqlSafe($artist->ended)."',".
                      " ".$artist->begin_area." ,".
                      " ".$artist->end_area."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $artist->id = $id;
	    return($artist);	
    }


    /*********************************************************
     * Update a Artist in musicbrainz database
     *
     * @param $artist
     * @return n/a
     *********************************************************
     */
    public function update($artist)
    {
        $query="UPDATE  artist ".
	          "SET ".
                      "id= ".$artist->id." ,".
                      "gid='".$this->sqlSafe($artist->gid)."',".
                      "name='".$this->sqlSafe($artist->name)."',".
                      "sort_name='".$this->sqlSafe($artist->sort_name)."',".
                      "begin_date_year= ".$artist->begin_date_year." ,".
                      "begin_date_month= ".$artist->begin_date_month." ,".
                      "begin_date_day= ".$artist->begin_date_day." ,".
                      "end_date_year= ".$artist->end_date_year." ,".
                      "end_date_month= ".$artist->end_date_month." ,".
                      "end_date_day= ".$artist->end_date_day." ,".
                      "type= ".$artist->type." ,".
                      "area= ".$artist->area." ,".
                      "gender= ".$artist->gender." ,".
                      "comment='".$this->sqlSafe($artist->comment)."',".
                      "edits_pending= ".$artist->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($artist->last_updated)."',".
                      "ended='".$this->sqlSafe($artist->ended)."',".
                      "begin_area= ".$artist->begin_area." ,".
                      "end_area= ".$artist->end_area."  ".                      
	          "WHERE id=".$artist->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Artist by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM artist WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>