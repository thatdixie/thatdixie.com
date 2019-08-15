<?php
require_once "MusicbrainzDB.php";
require      "Instrument_alias.php";

/********************************************************************
 * Instrument_aliasModel inherits MusicbrainzDB and provides functions to
 * map Instrument_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Instrument_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Instrument_alias by id
     *
     * @return instrument_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "instrument,".
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
	       "FROM instrument_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Instrument_alias"));
    }

    /*********************************************************
     * Insert a new Instrument_alias into musicbrainz database
     *
     * @param $instrument_alias
     * @return n/a
     *********************************************************
     */
    public function insert($instrument_alias)
    {
        $query="INSERT INTO instrument_alias ( ".
	              "id,".
                      "instrument,".
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
                      " ".$instrument_alias->instrument." ,".
                      "'".$this->sqlSafe($instrument_alias->name)."',".
                      "'".$this->sqlSafe($instrument_alias->locale)."',".
                      " ".$instrument_alias->edits_pending." ,".
                      "'".$this->sqlSafe($instrument_alias->last_updated)."',".
                      " ".$instrument_alias->type." ,".
                      "'".$this->sqlSafe($instrument_alias->sort_name)."',".
                      " ".$instrument_alias->begin_date_year." ,".
                      " ".$instrument_alias->begin_date_month." ,".
                      " ".$instrument_alias->begin_date_day." ,".
                      " ".$instrument_alias->end_date_year." ,".
                      " ".$instrument_alias->end_date_month." ,".
                      " ".$instrument_alias->end_date_day." ,".
                      "'".$this->sqlSafe($instrument_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($instrument_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Instrument_alias into musicbrainz database
     * and return a Instrument_alias with new autoincrement
     * primary key
     *
     * @param  $instrument_alias
     * @return $instrument_alias
     *********************************************************
     */
    public function insert2($instrument_alias)
    {
        $query="INSERT INTO instrument_alias ( ".
	              "id,".
                      "instrument,".
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
                      " ".$instrument_alias->instrument." ,".
                      "'".$this->sqlSafe($instrument_alias->name)."',".
                      "'".$this->sqlSafe($instrument_alias->locale)."',".
                      " ".$instrument_alias->edits_pending." ,".
                      "'".$this->sqlSafe($instrument_alias->last_updated)."',".
                      " ".$instrument_alias->type." ,".
                      "'".$this->sqlSafe($instrument_alias->sort_name)."',".
                      " ".$instrument_alias->begin_date_year." ,".
                      " ".$instrument_alias->begin_date_month." ,".
                      " ".$instrument_alias->begin_date_day." ,".
                      " ".$instrument_alias->end_date_year." ,".
                      " ".$instrument_alias->end_date_month." ,".
                      " ".$instrument_alias->end_date_day." ,".
                      "'".$this->sqlSafe($instrument_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($instrument_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $instrument_alias->id = $id;
	    return($instrument_alias);	
    }


    /*********************************************************
     * Update a Instrument_alias in musicbrainz database
     *
     * @param $instrument_alias
     * @return n/a
     *********************************************************
     */
    public function update($instrument_alias)
    {
        $query="UPDATE  instrument_alias ".
	          "SET ".
                      "id= ".$instrument_alias->id." ,".
                      "instrument= ".$instrument_alias->instrument." ,".
                      "name='".$this->sqlSafe($instrument_alias->name)."',".
                      "locale='".$this->sqlSafe($instrument_alias->locale)."',".
                      "edits_pending= ".$instrument_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($instrument_alias->last_updated)."',".
                      "type= ".$instrument_alias->type." ,".
                      "sort_name='".$this->sqlSafe($instrument_alias->sort_name)."',".
                      "begin_date_year= ".$instrument_alias->begin_date_year." ,".
                      "begin_date_month= ".$instrument_alias->begin_date_month." ,".
                      "begin_date_day= ".$instrument_alias->begin_date_day." ,".
                      "end_date_year= ".$instrument_alias->end_date_year." ,".
                      "end_date_month= ".$instrument_alias->end_date_month." ,".
                      "end_date_day= ".$instrument_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($instrument_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($instrument_alias->ended)."' ".                      
	          "WHERE id=".$instrument_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Instrument_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM instrument_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>