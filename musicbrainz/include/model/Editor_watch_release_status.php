<?php
require_once "DBObject.php";

/********************************************
 * Editor_watch_release_status represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_watch_release_status extends DBObject
{    
    public $editor=0;
    public $release_status=0;



    /*****************************************************
     * Returns an HTTP parameter list for Editor_watch_release_status object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="editor=".$this->editor."&";
        $b.="release_status=".$this->release_status."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_watch_release_status object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_watch_release_status from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_watch_release_status($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->editor= $json['editor'];
        $this->release_status= $json['release_status'];

        }
    }
}

?>
