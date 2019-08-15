<?php
require_once "DBObject.php";

/********************************************
 * Iswc represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Iswc extends DBObject
{    
    public $id=0;
    public $work=0;
    public $iswc="";
    public $source=0;
    public $edits_pending=0;
    public $created="";



    /*****************************************************
     * Returns an HTTP parameter list for Iswc object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="work=".$this->work."&";
        $b.="iswc=".$this->iswc."&";
        $b.="source=".$this->source."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="created=".$this->created."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Iswc object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Iswc from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Iswc($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->work= $json['work'];
        $this->iswc= $json['iswc'];
        $this->source= $json['source'];
        $this->edits_pending= $json['edits_pending'];
        $this->created= $json['created'];

        }
    }
}

?>
