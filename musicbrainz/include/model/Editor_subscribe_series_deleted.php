<?php
require_once "DBObject.php";

/********************************************
 * Editor_subscribe_series_deleted represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_subscribe_series_deleted extends DBObject
{    
    public $editor=0;
    public $gid="";
    public $deleted_by=0;



    /*****************************************************
     * Returns an HTTP parameter list for Editor_subscribe_series_deleted object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="editor=".$this->editor."&";
        $b.="gid=".$this->gid."&";
        $b.="deleted_by=".$this->deleted_by."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_subscribe_series_deleted object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_subscribe_series_deleted from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_subscribe_series_deleted($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->editor= $json['editor'];
        $this->gid= $json['gid'];
        $this->deleted_by= $json['deleted_by'];

        }
    }
}

?>
