<?php
require_once "DBObject.php";

/********************************************
 * Editor_watch_artist represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_watch_artist extends DBObject
{    
    public $artist=0;
    public $editor=0;



    /*****************************************************
     * Returns an HTTP parameter list for Editor_watch_artist object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="artist=".$this->artist."&";
        $b.="editor=".$this->editor."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_watch_artist object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_watch_artist from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_watch_artist($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->artist= $json['artist'];
        $this->editor= $json['editor'];

        }
    }
}

?>
