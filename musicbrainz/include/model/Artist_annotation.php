<?php
require_once "DBObject.php";

/********************************************
 * Artist_annotation represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Artist_annotation extends DBObject
{    
    public $artist=0;
    public $annotation=0;



    /*****************************************************
     * Returns an HTTP parameter list for Artist_annotation object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="artist=".$this->artist."&";
        $b.="annotation=".$this->annotation."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Artist_annotation object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Artist_annotation from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Artist_annotation($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->artist= $json['artist'];
        $this->annotation= $json['annotation'];

        }
    }
}

?>
