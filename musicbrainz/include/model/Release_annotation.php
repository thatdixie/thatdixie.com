<?php
require_once "DBObject.php";

/********************************************
 * Release_annotation represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Release_annotation extends DBObject
{    
    public $release=0;
    public $annotation=0;



    /*****************************************************
     * Returns an HTTP parameter list for Release_annotation object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="release=".$this->release."&";
        $b.="annotation=".$this->annotation."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Release_annotation object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Release_annotation from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Release_annotation($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->release= $json['release'];
        $this->annotation= $json['annotation'];

        }
    }
}

?>
