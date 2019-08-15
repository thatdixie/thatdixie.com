<?php
require_once "DBObject.php";

/********************************************
 * Country_area represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Country_area extends DBObject
{    
    public $area=0;



    /*****************************************************
     * Returns an HTTP parameter list for Country_area object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="area=".$this->area."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Country_area object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Country_area from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Country_area($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->area= $json['area'];

        }
    }
}

?>
