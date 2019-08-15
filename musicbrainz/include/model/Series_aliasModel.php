<?php
require_once "MusicbrainzDB.php";
require      "Series_alias.php";

/********************************************************************
 * Series_aliasModel inherits MusicbrainzDB and provides functions to
 * map Series_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Series_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Series_alias by id
     *
     * @return series_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "series,".
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
	       "FROM series_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Series_alias"));
    }

    /*********************************************************
     * Insert a new Series_alias into musicbrainz database
     *
     * @param $series_alias
     * @return n/a
     *********************************************************
     */
    public function insert($series_alias)
    {
        $query="INSERT INTO series_alias ( ".
	              "id,".
                      "series,".
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
                      " ".$series_alias->series." ,".
                      "'".$this->sqlSafe($series_alias->name)."',".
                      "'".$this->sqlSafe($series_alias->locale)."',".
                      " ".$series_alias->edits_pending." ,".
                      "'".$this->sqlSafe($series_alias->last_updated)."',".
                      " ".$series_alias->type." ,".
                      "'".$this->sqlSafe($series_alias->sort_name)."',".
                      " ".$series_alias->begin_date_year." ,".
                      " ".$series_alias->begin_date_month." ,".
                      " ".$series_alias->begin_date_day." ,".
                      " ".$series_alias->end_date_year." ,".
                      " ".$series_alias->end_date_month." ,".
                      " ".$series_alias->end_date_day." ,".
                      "'".$this->sqlSafe($series_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($series_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Series_alias into musicbrainz database
     * and return a Series_alias with new autoincrement
     * primary key
     *
     * @param  $series_alias
     * @return $series_alias
     *********************************************************
     */
    public function insert2($series_alias)
    {
        $query="INSERT INTO series_alias ( ".
	              "id,".
                      "series,".
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
                      " ".$series_alias->series." ,".
                      "'".$this->sqlSafe($series_alias->name)."',".
                      "'".$this->sqlSafe($series_alias->locale)."',".
                      " ".$series_alias->edits_pending." ,".
                      "'".$this->sqlSafe($series_alias->last_updated)."',".
                      " ".$series_alias->type." ,".
                      "'".$this->sqlSafe($series_alias->sort_name)."',".
                      " ".$series_alias->begin_date_year." ,".
                      " ".$series_alias->begin_date_month." ,".
                      " ".$series_alias->begin_date_day." ,".
                      " ".$series_alias->end_date_year." ,".
                      " ".$series_alias->end_date_month." ,".
                      " ".$series_alias->end_date_day." ,".
                      "'".$this->sqlSafe($series_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($series_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $series_alias->id = $id;
	    return($series_alias);	
    }


    /*********************************************************
     * Update a Series_alias in musicbrainz database
     *
     * @param $series_alias
     * @return n/a
     *********************************************************
     */
    public function update($series_alias)
    {
        $query="UPDATE  series_alias ".
	          "SET ".
                      "id= ".$series_alias->id." ,".
                      "series= ".$series_alias->series." ,".
                      "name='".$this->sqlSafe($series_alias->name)."',".
                      "locale='".$this->sqlSafe($series_alias->locale)."',".
                      "edits_pending= ".$series_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($series_alias->last_updated)."',".
                      "type= ".$series_alias->type." ,".
                      "sort_name='".$this->sqlSafe($series_alias->sort_name)."',".
                      "begin_date_year= ".$series_alias->begin_date_year." ,".
                      "begin_date_month= ".$series_alias->begin_date_month." ,".
                      "begin_date_day= ".$series_alias->begin_date_day." ,".
                      "end_date_year= ".$series_alias->end_date_year." ,".
                      "end_date_month= ".$series_alias->end_date_month." ,".
                      "end_date_day= ".$series_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($series_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($series_alias->ended)."' ".                      
	          "WHERE id=".$series_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Series_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM series_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>