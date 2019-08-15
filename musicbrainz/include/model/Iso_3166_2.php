<?php
require_once "DBObject.php";

/********************************************
 * Iso_3166_2 represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Iso_3166_2 extends DBObject
{    
    public $area=0;
    public $code="";



    /*****************************************************
     * Returns an HTTP parameter list for Iso_3166_2 object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="area=".$this->area."&";
        $b.="code=".$this->code."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Iso_3166_2 object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Iso_3166_2 from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Iso_3166_2($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->area= $json['area'];
        $this->code= $json['code'];

        }
    }
}

?>
