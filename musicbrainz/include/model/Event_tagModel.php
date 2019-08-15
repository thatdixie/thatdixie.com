<?php
require_once "MusicbrainzDB.php";
require      "Event_tag.php";

/********************************************************************
 * Event_tagModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Event_tag class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Event_tagModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Event_tag VIEW
     *
     * @return event_tag
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "event,".
                      "tag,".
                      "count,".
                      "last_updated ".                      		               
	       "FROM event_tag ";
        return($this->selectDB($query, "Event_tag"));
    }
}

?>