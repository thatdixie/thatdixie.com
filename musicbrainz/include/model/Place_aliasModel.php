<?php
require_once "MusicbrainzDB.php";
require      "Place_alias.php";

/********************************************************************
 * Place_aliasModel inherits MusicbrainzDB and provides functions to
 * map Place_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Place_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Place_alias by id
     *
     * @return place_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "place,".
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
	       "FROM place_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Place_alias"));
    }

    /*********************************************************
     * Insert a new Place_alias into musicbrainz database
     *
     * @param $place_alias
     * @return n/a
     *********************************************************
     */
    public function insert($place_alias)
    {
        $query="INSERT INTO place_alias ( ".
	              "id,".
                      "place,".
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
                      " ".$place_alias->place." ,".
                      "'".$this->sqlSafe($place_alias->name)."',".
                      "'".$this->sqlSafe($place_alias->locale)."',".
                      " ".$place_alias->edits_pending." ,".
                      "'".$this->sqlSafe($place_alias->last_updated)."',".
                      " ".$place_alias->type." ,".
                      "'".$this->sqlSafe($place_alias->sort_name)."',".
                      " ".$place_alias->begin_date_year." ,".
                      " ".$place_alias->begin_date_month." ,".
                      " ".$place_alias->begin_date_day." ,".
                      " ".$place_alias->end_date_year." ,".
                      " ".$place_alias->end_date_month." ,".
                      " ".$place_alias->end_date_day." ,".
                      "'".$this->sqlSafe($place_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($place_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Place_alias into musicbrainz database
     * and return a Place_alias with new autoincrement
     * primary key
     *
     * @param  $place_alias
     * @return $place_alias
     *********************************************************
     */
    public function insert2($place_alias)
    {
        $query="INSERT INTO place_alias ( ".
	              "id,".
                      "place,".
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
                      " ".$place_alias->place." ,".
                      "'".$this->sqlSafe($place_alias->name)."',".
                      "'".$this->sqlSafe($place_alias->locale)."',".
                      " ".$place_alias->edits_pending." ,".
                      "'".$this->sqlSafe($place_alias->last_updated)."',".
                      " ".$place_alias->type." ,".
                      "'".$this->sqlSafe($place_alias->sort_name)."',".
                      " ".$place_alias->begin_date_year." ,".
                      " ".$place_alias->begin_date_month." ,".
                      " ".$place_alias->begin_date_day." ,".
                      " ".$place_alias->end_date_year." ,".
                      " ".$place_alias->end_date_month." ,".
                      " ".$place_alias->end_date_day." ,".
                      "'".$this->sqlSafe($place_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($place_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $place_alias->id = $id;
	    return($place_alias);	
    }


    /*********************************************************
     * Update a Place_alias in musicbrainz database
     *
     * @param $place_alias
     * @return n/a
     *********************************************************
     */
    public function update($place_alias)
    {
        $query="UPDATE  place_alias ".
	          "SET ".
                      "id= ".$place_alias->id." ,".
                      "place= ".$place_alias->place." ,".
                      "name='".$this->sqlSafe($place_alias->name)."',".
                      "locale='".$this->sqlSafe($place_alias->locale)."',".
                      "edits_pending= ".$place_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($place_alias->last_updated)."',".
                      "type= ".$place_alias->type." ,".
                      "sort_name='".$this->sqlSafe($place_alias->sort_name)."',".
                      "begin_date_year= ".$place_alias->begin_date_year." ,".
                      "begin_date_month= ".$place_alias->begin_date_month." ,".
                      "begin_date_day= ".$place_alias->begin_date_day." ,".
                      "end_date_year= ".$place_alias->end_date_year." ,".
                      "end_date_month= ".$place_alias->end_date_month." ,".
                      "end_date_day= ".$place_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($place_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($place_alias->ended)."' ".                      
	          "WHERE id=".$place_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Place_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM place_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>