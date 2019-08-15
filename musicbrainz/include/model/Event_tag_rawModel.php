<?php
require_once "MusicbrainzDB.php";
require      "Event_tag_raw.php";

/********************************************************************
 * Event_tag_rawModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Event_tag_raw class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Event_tag_rawModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Event_tag_raw VIEW
     *
     * @return event_tag_raw
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "event,".
                      "editor,".
                      "tag,".
                      "is_upvote ".                      		               
	       "FROM event_tag_raw ";
        return($this->selectDB($query, "Event_tag_raw"));
    }
}

?>