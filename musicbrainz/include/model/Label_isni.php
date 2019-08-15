<?php
require_once "DBObject.php";

/********************************************
 * Label_isni represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Label_isni extends DBObject
{    
    public $label=0;
    public $isni="";
    public $edits_pending=0;
    public $created="";



    /*****************************************************
     * Returns an HTTP parameter list for Label_isni object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="label=".$this->label."&";
        $b.="isni=".$this->isni."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="created=".$this->created."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Label_isni object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Label_isni from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Label_isni($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->label= $json['label'];
        $this->isni= $json['isni'];
        $this->edits_pending= $json['edits_pending'];
        $this->created= $json['created'];

        }
    }
}

?>
