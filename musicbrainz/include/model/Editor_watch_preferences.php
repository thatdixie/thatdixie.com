<?php
require_once "DBObject.php";

/********************************************
 * Editor_watch_preferences represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_watch_preferences extends DBObject
{    
    public $editor=0;
    public $notify_via_email="";
    public $notification_timeframe="";
    public $last_checked="";



    /*****************************************************
     * Returns an HTTP parameter list for Editor_watch_preferences object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="editor=".$this->editor."&";
        $b.="notify_via_email=".$this->notify_via_email."&";
        $b.="notification_timeframe=".$this->notification_timeframe."&";
        $b.="last_checked=".$this->last_checked."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_watch_preferences object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_watch_preferences from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_watch_preferences($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->editor= $json['editor'];
        $this->notify_via_email= $json['notify_via_email'];
        $this->notification_timeframe= $json['notification_timeframe'];
        $this->last_checked= $json['last_checked'];

        }
    }
}

?>
