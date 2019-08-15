<?php
require_once "MusicbrainzDB.php";
require      "Recording_alias.php";

/********************************************************************
 * Recording_aliasModel inherits MusicbrainzDB and provides functions to
 * map Recording_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Recording_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Recording_alias by id
     *
     * @return recording_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "recording,".
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
	       "FROM recording_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Recording_alias"));
    }

    /*********************************************************
     * Insert a new Recording_alias into musicbrainz database
     *
     * @param $recording_alias
     * @return n/a
     *********************************************************
     */
    public function insert($recording_alias)
    {
        $query="INSERT INTO recording_alias ( ".
	              "id,".
                      "recording,".
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
                      " ".$recording_alias->recording." ,".
                      "'".$this->sqlSafe($recording_alias->name)."',".
                      "'".$this->sqlSafe($recording_alias->locale)."',".
                      " ".$recording_alias->edits_pending." ,".
                      "'".$this->sqlSafe($recording_alias->last_updated)."',".
                      " ".$recording_alias->type." ,".
                      "'".$this->sqlSafe($recording_alias->sort_name)."',".
                      " ".$recording_alias->begin_date_year." ,".
                      " ".$recording_alias->begin_date_month." ,".
                      " ".$recording_alias->begin_date_day." ,".
                      " ".$recording_alias->end_date_year." ,".
                      " ".$recording_alias->end_date_month." ,".
                      " ".$recording_alias->end_date_day." ,".
                      "'".$this->sqlSafe($recording_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($recording_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Recording_alias into musicbrainz database
     * and return a Recording_alias with new autoincrement
     * primary key
     *
     * @param  $recording_alias
     * @return $recording_alias
     *********************************************************
     */
    public function insert2($recording_alias)
    {
        $query="INSERT INTO recording_alias ( ".
	              "id,".
                      "recording,".
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
                      " ".$recording_alias->recording." ,".
                      "'".$this->sqlSafe($recording_alias->name)."',".
                      "'".$this->sqlSafe($recording_alias->locale)."',".
                      " ".$recording_alias->edits_pending." ,".
                      "'".$this->sqlSafe($recording_alias->last_updated)."',".
                      " ".$recording_alias->type." ,".
                      "'".$this->sqlSafe($recording_alias->sort_name)."',".
                      " ".$recording_alias->begin_date_year." ,".
                      " ".$recording_alias->begin_date_month." ,".
                      " ".$recording_alias->begin_date_day." ,".
                      " ".$recording_alias->end_date_year." ,".
                      " ".$recording_alias->end_date_month." ,".
                      " ".$recording_alias->end_date_day." ,".
                      "'".$this->sqlSafe($recording_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($recording_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $recording_alias->id = $id;
	    return($recording_alias);	
    }


    /*********************************************************
     * Update a Recording_alias in musicbrainz database
     *
     * @param $recording_alias
     * @return n/a
     *********************************************************
     */
    public function update($recording_alias)
    {
        $query="UPDATE  recording_alias ".
	          "SET ".
                      "id= ".$recording_alias->id." ,".
                      "recording= ".$recording_alias->recording." ,".
                      "name='".$this->sqlSafe($recording_alias->name)."',".
                      "locale='".$this->sqlSafe($recording_alias->locale)."',".
                      "edits_pending= ".$recording_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($recording_alias->last_updated)."',".
                      "type= ".$recording_alias->type." ,".
                      "sort_name='".$this->sqlSafe($recording_alias->sort_name)."',".
                      "begin_date_year= ".$recording_alias->begin_date_year." ,".
                      "begin_date_month= ".$recording_alias->begin_date_month." ,".
                      "begin_date_day= ".$recording_alias->begin_date_day." ,".
                      "end_date_year= ".$recording_alias->end_date_year." ,".
                      "end_date_month= ".$recording_alias->end_date_month." ,".
                      "end_date_day= ".$recording_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($recording_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($recording_alias->ended)."' ".                      
	          "WHERE id=".$recording_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Recording_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM recording_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>