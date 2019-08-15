<?php
require_once "MusicbrainzDB.php";
require      "Event_meta.php";

/********************************************************************
 * Event_metaModel inherits MusicbrainzDB and provides the select() 
 * function which maps the Event_meta class/VIEW in musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Event_metaModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns  Event_meta VIEW
     *
     * @return event_meta
     *********************************************************
     */
    public function select()
    {
        $query="SELECT ".
                      "id,".
                      "rating,".
                      "rating_count ".                      		               
	       "FROM event_meta ";
        return($this->selectDB($query, "Event_meta"));
    }
}

?>