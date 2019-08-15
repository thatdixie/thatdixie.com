<?php
require_once "DBObject.php";

/********************************************
 * Release_country represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Release_country extends DBObject
{    
    public $release=0;
    public $country=0;
    public $date_year=0;
    public $date_month=0;
    public $date_day=0;



    /*****************************************************
     * Returns an HTTP parameter list for Release_country object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="release=".$this->release."&";
        $b.="country=".$this->country."&";
        $b.="date_year=".$this->date_year."&";
        $b.="date_month=".$this->date_month."&";
        $b.="date_day=".$this->date_day."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Release_country object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Release_country from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Release_country($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->release= $json['release'];
        $this->country= $json['country'];
        $this->date_year= $json['date_year'];
        $this->date_month= $json['date_month'];
        $this->date_day= $json['date_day'];

        }
    }
}

?>
