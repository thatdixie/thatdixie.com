<?php
require_once "DBObject.php";

/********************************************
 * Medium_cdtoc represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Medium_cdtoc extends DBObject
{    
    public $id=0;
    public $medium=0;
    public $cdtoc=0;
    public $edits_pending=0;
    public $last_updated="";



    /*****************************************************
     * Returns an HTTP parameter list for Medium_cdtoc object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="medium=".$this->medium."&";
        $b.="cdtoc=".$this->cdtoc."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Medium_cdtoc object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Medium_cdtoc from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Medium_cdtoc($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->medium= $json['medium'];
        $this->cdtoc= $json['cdtoc'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];

        }
    }
}

?>
