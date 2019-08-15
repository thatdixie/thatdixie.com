<?php
require_once "MusicbrainzDB.php";
require      "Event_rating_raw.php";

/********************************************************************
 * Event_rating_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Event_rating_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Event_rating_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Event_rating_raw VIEW
     *
     * @return event_rating_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "event,".
                      "editor,".
                      "rating ".                      		               
	       "FROM event_rating_raw ";
        return($this->selectDB($query, "Event_rating_raw"));
    }
}

?>