<?php
require_once "MusicbrainzDB.php";
require      "Event.php";

/********************************************************************
 * EventModel inherits MusicbrainzDB and provides functions to
 * map Event class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class EventModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Event by id
     *
     * @return event
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "gid,".
                      "name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "time,".
                      "type,".
                      "cancelled,".
                      "setlist,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "ended ".                      		               
	       "FROM event ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Event"));
    }

    /*********************************************************
     * Insert a new Event into musicbrainz database
     *
     * @param $event
     * @return n/a
     *********************************************************
     */
    public function insert($event)
    {
        $query="INSERT INTO event ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "time,".
                      "type,".
                      "cancelled,".
                      "setlist,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($event->gid)."',".
                      "'".$this->sqlSafe($event->name)."',".
                      " ".$event->begin_date_year." ,".
                      " ".$event->begin_date_month." ,".
                      " ".$event->begin_date_day." ,".
                      " ".$event->end_date_year." ,".
                      " ".$event->end_date_month." ,".
                      " ".$event->end_date_day." ,".
                      "'".$this->sqlSafe($event->time)."',".
                      " ".$event->type." ,".
                      "'".$this->sqlSafe($event->cancelled)."',".
                      "'".$this->sqlSafe($event->setlist)."',".
                      "'".$this->sqlSafe($event->comment)."',".
                      " ".$event->edits_pending." ,".
                      "'".$this->sqlSafe($event->last_updated)."',".
                      "'".$this->sqlSafe($event->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Event into musicbrainz database
     * and return a Event with new autoincrement
     * primary key
     *
     * @param  $event
     * @return $event
     *********************************************************
     */
    public function insert2($event)
    {
        $query="INSERT INTO event ( ".
	              "id,".
                      "gid,".
                      "name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "time,".
                      "type,".
                      "cancelled,".
                      "setlist,".
                      "comment,".
                      "edits_pending,".
                      "last_updated,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($event->gid)."',".
                      "'".$this->sqlSafe($event->name)."',".
                      " ".$event->begin_date_year." ,".
                      " ".$event->begin_date_month." ,".
                      " ".$event->begin_date_day." ,".
                      " ".$event->end_date_year." ,".
                      " ".$event->end_date_month." ,".
                      " ".$event->end_date_day." ,".
                      "'".$this->sqlSafe($event->time)."',".
                      " ".$event->type." ,".
                      "'".$this->sqlSafe($event->cancelled)."',".
                      "'".$this->sqlSafe($event->setlist)."',".
                      "'".$this->sqlSafe($event->comment)."',".
                      " ".$event->edits_pending." ,".
                      "'".$this->sqlSafe($event->last_updated)."',".
                      "'".$this->sqlSafe($event->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $event->id = $id;
	    return($event);	
    }


    /*********************************************************
     * Update a Event in musicbrainz database
     *
     * @param $event
     * @return n/a
     *********************************************************
     */
    public function update($event)
    {
        $query="UPDATE  event ".
	          "SET ".
                      "id= ".$event->id." ,".
                      "gid='".$this->sqlSafe($event->gid)."',".
                      "name='".$this->sqlSafe($event->name)."',".
                      "begin_date_year= ".$event->begin_date_year." ,".
                      "begin_date_month= ".$event->begin_date_month." ,".
                      "begin_date_day= ".$event->begin_date_day." ,".
                      "end_date_year= ".$event->end_date_year." ,".
                      "end_date_month= ".$event->end_date_month." ,".
                      "end_date_day= ".$event->end_date_day." ,".
                      "time='".$this->sqlSafe($event->time)."',".
                      "type= ".$event->type." ,".
                      "cancelled='".$this->sqlSafe($event->cancelled)."',".
                      "setlist='".$this->sqlSafe($event->setlist)."',".
                      "comment='".$this->sqlSafe($event->comment)."',".
                      "edits_pending= ".$event->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($event->last_updated)."',".
                      "ended='".$this->sqlSafe($event->ended)."' ".                      
	          "WHERE id=".$event->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Event by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM event WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>