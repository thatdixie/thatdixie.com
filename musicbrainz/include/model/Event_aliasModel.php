<?php
require_once "MusicbrainzDB.php";
require      "Event_alias.php";

/********************************************************************
 * Event_aliasModel inherits MusicbrainzDB and provides functions to
 * map Event_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Event_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Event_alias by id
     *
     * @return event_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "event,".
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
	       "FROM event_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Event_alias"));
    }

    /*********************************************************
     * Insert a new Event_alias into musicbrainz database
     *
     * @param $event_alias
     * @return n/a
     *********************************************************
     */
    public function insert($event_alias)
    {
        $query="INSERT INTO event_alias ( ".
	              "id,".
                      "event,".
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
                      " ".$event_alias->event." ,".
                      "'".$this->sqlSafe($event_alias->name)."',".
                      "'".$this->sqlSafe($event_alias->locale)."',".
                      " ".$event_alias->edits_pending." ,".
                      "'".$this->sqlSafe($event_alias->last_updated)."',".
                      " ".$event_alias->type." ,".
                      "'".$this->sqlSafe($event_alias->sort_name)."',".
                      " ".$event_alias->begin_date_year." ,".
                      " ".$event_alias->begin_date_month." ,".
                      " ".$event_alias->begin_date_day." ,".
                      " ".$event_alias->end_date_year." ,".
                      " ".$event_alias->end_date_month." ,".
                      " ".$event_alias->end_date_day." ,".
                      "'".$this->sqlSafe($event_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($event_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Event_alias into musicbrainz database
     * and return a Event_alias with new autoincrement
     * primary key
     *
     * @param  $event_alias
     * @return $event_alias
     *********************************************************
     */
    public function insert2($event_alias)
    {
        $query="INSERT INTO event_alias ( ".
	              "id,".
                      "event,".
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
                      " ".$event_alias->event." ,".
                      "'".$this->sqlSafe($event_alias->name)."',".
                      "'".$this->sqlSafe($event_alias->locale)."',".
                      " ".$event_alias->edits_pending." ,".
                      "'".$this->sqlSafe($event_alias->last_updated)."',".
                      " ".$event_alias->type." ,".
                      "'".$this->sqlSafe($event_alias->sort_name)."',".
                      " ".$event_alias->begin_date_year." ,".
                      " ".$event_alias->begin_date_month." ,".
                      " ".$event_alias->begin_date_day." ,".
                      " ".$event_alias->end_date_year." ,".
                      " ".$event_alias->end_date_month." ,".
                      " ".$event_alias->end_date_day." ,".
                      "'".$this->sqlSafe($event_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($event_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $event_alias->id = $id;
	    return($event_alias);	
    }


    /*********************************************************
     * Update a Event_alias in musicbrainz database
     *
     * @param $event_alias
     * @return n/a
     *********************************************************
     */
    public function update($event_alias)
    {
        $query="UPDATE  event_alias ".
	          "SET ".
                      "id= ".$event_alias->id." ,".
                      "event= ".$event_alias->event." ,".
                      "name='".$this->sqlSafe($event_alias->name)."',".
                      "locale='".$this->sqlSafe($event_alias->locale)."',".
                      "edits_pending= ".$event_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($event_alias->last_updated)."',".
                      "type= ".$event_alias->type." ,".
                      "sort_name='".$this->sqlSafe($event_alias->sort_name)."',".
                      "begin_date_year= ".$event_alias->begin_date_year." ,".
                      "begin_date_month= ".$event_alias->begin_date_month." ,".
                      "begin_date_day= ".$event_alias->begin_date_day." ,".
                      "end_date_year= ".$event_alias->end_date_year." ,".
                      "end_date_month= ".$event_alias->end_date_month." ,".
                      "end_date_day= ".$event_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($event_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($event_alias->ended)."' ".                      
	          "WHERE id=".$event_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Event_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM event_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>