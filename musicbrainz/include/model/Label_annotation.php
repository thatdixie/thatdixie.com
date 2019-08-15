<?php
require_once "DBObject.php";

/********************************************
 * Label_annotation represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Label_annotation extends DBObject
{    
    public $label=0;
    public $annotation=0;



    /*****************************************************
     * Returns an HTTP parameter list for Label_annotation object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="label=".$this->label."&";
        $b.="annotation=".$this->annotation."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Label_annotation object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Label_annotation from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Label_annotation($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->label= $json['label'];
        $this->annotation= $json['annotation'];

        }
    }
}

?>
