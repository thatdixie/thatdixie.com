<?php
require_once "DBObject.php";

/********************************************
 * Release_group_meta represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Release_group_meta extends DBObject
{    
    public $id=0;
    public $release_count=0;
    public $first_release_date_year=0;
    public $first_release_date_month=0;
    public $first_release_date_day=0;
    public $rating=0;
    public $rating_count=0;



    /*****************************************************
     * Returns an HTTP parameter list for Release_group_meta object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="release_count=".$this->release_count."&";
        $b.="first_release_date_year=".$this->first_release_date_year."&";
        $b.="first_release_date_month=".$this->first_release_date_month."&";
        $b.="first_release_date_day=".$this->first_release_date_day."&";
        $b.="rating=".$this->rating."&";
        $b.="rating_count=".$this->rating_count."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Release_group_meta object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Release_group_meta from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Release_group_meta($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->release_count= $json['release_count'];
        $this->first_release_date_year= $json['first_release_date_year'];
        $this->first_release_date_month= $json['first_release_date_month'];
        $this->first_release_date_day= $json['first_release_date_day'];
        $this->rating= $json['rating'];
        $this->rating_count= $json['rating_count'];

        }
    }
}

?>
