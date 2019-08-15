<?php
require_once "MusicbrainzDB.php";
require      "Artist_alias.php";

/********************************************************************
 * Artist_aliasModel inherits MusicbrainzDB and provides functions to
 * map Artist_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Artist_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Artist_alias by id
     *
     * @return artist_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "artist,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      		               
	       "FROM artist_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Artist_alias"));
    }

    /*********************************************************
     * Insert a new Artist_alias into musicbrainz database
     *
     * @param $artist_alias
     * @return n/a
     *********************************************************
     */
    public function insert($artist_alias)
    {
        $query="INSERT INTO artist_alias ( ".
	              "id,".
                      "artist,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$artist_alias->artist." ,".
                      "'".$this->sqlSafe($artist_alias->name)."',".
                      "'".$this->sqlSafe($artist_alias->locale)."',".
                      " ".$artist_alias->edits_pending." ,".
                      "'".$this->sqlSafe($artist_alias->last_updated)."',".
                      " ".$artist_alias->type." ,".
                      "'".$this->sqlSafe($artist_alias->sort_name)."',".
                      " ".$artist_alias->begin_date_year." ,".
                      " ".$artist_alias->begin_date_month." ,".
                      " ".$artist_alias->begin_date_day." ,".
                      " ".$artist_alias->end_date_year." ,".
                      " ".$artist_alias->end_date_month." ,".
                      " ".$artist_alias->end_date_day." ,".
                      "'".$this->sqlSafe($artist_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($artist_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Artist_alias into musicbrainz database
     * and return a Artist_alias with new autoincrement
     * primary key
     *
     * @param  $artist_alias
     * @return $artist_alias
     *********************************************************
     */
    public function insert2($artist_alias)
    {
        $query="INSERT INTO artist_alias ( ".
	              "id,".
                      "artist,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$artist_alias->artist." ,".
                      "'".$this->sqlSafe($artist_alias->name)."',".
                      "'".$this->sqlSafe($artist_alias->locale)."',".
                      " ".$artist_alias->edits_pending." ,".
                      "'".$this->sqlSafe($artist_alias->last_updated)."',".
                      " ".$artist_alias->type." ,".
                      "'".$this->sqlSafe($artist_alias->sort_name)."',".
                      " ".$artist_alias->begin_date_year." ,".
                      " ".$artist_alias->begin_date_month." ,".
                      " ".$artist_alias->begin_date_day." ,".
                      " ".$artist_alias->end_date_year." ,".
                      " ".$artist_alias->end_date_month." ,".
                      " ".$artist_alias->end_date_day." ,".
                      "'".$this->sqlSafe($artist_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($artist_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $artist_alias->id = $id;
	    return($artist_alias);	
    }


    /*********************************************************
     * Update a Artist_alias in musicbrainz database
     *
     * @param $artist_alias
     * @return n/a
     *********************************************************
     */
    public function update($artist_alias)
    {
        $query="UPDATE  artist_alias ".
	          "SET ".
                      "id= ".$artist_alias->id." ,".
                      "artist= ".$artist_alias->artist." ,".
                      "name='".$this->sqlSafe($artist_alias->name)."',".
                      "locale='".$this->sqlSafe($artist_alias->locale)."',".
                      "edits_pending= ".$artist_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($artist_alias->last_updated)."',".
                      "type= ".$artist_alias->type." ,".
                      "sort_name='".$this->sqlSafe($artist_alias->sort_name)."',".
                      "begin_date_year= ".$artist_alias->begin_date_year." ,".
                      "begin_date_month= ".$artist_alias->begin_date_month." ,".
                      "begin_date_day= ".$artist_alias->begin_date_day." ,".
                      "end_date_year= ".$artist_alias->end_date_year." ,".
                      "end_date_month= ".$artist_alias->end_date_month." ,".
                      "end_date_day= ".$artist_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($artist_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($artist_alias->ended)."' ".                      
	          "WHERE id=".$artist_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Artist_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM artist_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>