<?php
require_once "DBObject.php";

/********************************************
 * Link represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Link extends DBObject
{    
    public $id=0;
    public $link_type=0;
    public $begin_date_year=0;
    public $begin_date_month=0;
    public $begin_date_day=0;
    public $end_date_year=0;
    public $end_date_month=0;
    public $end_date_day=0;
    public $attribute_count=0;
    public $created="";
    public $ended="";



    /*****************************************************
     * Returns an HTTP parameter list for Link object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="link_type=".$this->link_type."&";
        $b.="begin_date_year=".$this->begin_date_year."&";
        $b.="begin_date_month=".$this->begin_date_month."&";
        $b.="begin_date_day=".$this->begin_date_day."&";
        $b.="end_date_year=".$this->end_date_year."&";
        $b.="end_date_month=".$this->end_date_month."&";
        $b.="end_date_day=".$this->end_date_day."&";
        $b.="attribute_count=".$this->attribute_count."&";
        $b.="created=".$this->created."&";
        $b.="ended=".$this->ended."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Link object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Link from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Link($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->link_type= $json['link_type'];
        $this->begin_date_year= $json['begin_date_year'];
        $this->begin_date_month= $json['begin_date_month'];
        $this->begin_date_day= $json['begin_date_day'];
        $this->end_date_year= $json['end_date_year'];
        $this->end_date_month= $json['end_date_month'];
        $this->end_date_day= $json['end_date_day'];
        $this->attribute_count= $json['attribute_count'];
        $this->created= $json['created'];
        $this->ended= $json['ended'];

        }
    }
}

?>
