<?php
require_once "DBObject.php";

/********************************************
 * Work_annotation represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Work_annotation extends DBObject
{    
    public $work=0;
    public $annotation=0;



    /*****************************************************
     * Returns an HTTP parameter list for Work_annotation object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="work=".$this->work."&";
        $b.="annotation=".$this->annotation."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Work_annotation object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Work_annotation from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Work_annotation($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->work= $json['work'];
        $this->annotation= $json['annotation'];

        }
    }
}

?>
