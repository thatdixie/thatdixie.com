<?php
require_once "DBObject.php";

/********************************************
 * Event represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Event extends DBObject
{    
    public $id=0;
    public $gid="";
    public $name="";
    public $begin_date_year=0;
    public $begin_date_month=0;
    public $begin_date_day=0;
    public $end_date_year=0;
    public $end_date_month=0;
    public $end_date_day=0;
    public $time="";
    public $type=0;
    public $cancelled="";
    public $setlist="";
    public $comment="";
    public $edits_pending=0;
    public $last_updated="";
    public $ended="";



    /*****************************************************
     * Returns an HTTP parameter list for Event object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="gid=".$this->gid."&";
        $b.="name=".$this->name."&";
        $b.="begin_date_year=".$this->begin_date_year."&";
        $b.="begin_date_month=".$this->begin_date_month."&";
        $b.="begin_date_day=".$this->begin_date_day."&";
        $b.="end_date_year=".$this->end_date_year."&";
        $b.="end_date_month=".$this->end_date_month."&";
        $b.="end_date_day=".$this->end_date_day."&";
        $b.="time=".$this->time."&";
        $b.="type=".$this->type."&";
        $b.="cancelled=".$this->cancelled."&";
        $b.="setlist=".$this->setlist."&";
        $b.="comment=".$this->comment."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        $b.="ended=".$this->ended."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Event object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Event from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Event($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->gid= $json['gid'];
        $this->name= $json['name'];
        $this->begin_date_year= $json['begin_date_year'];
        $this->begin_date_month= $json['begin_date_month'];
        $this->begin_date_day= $json['begin_date_day'];
        $this->end_date_year= $json['end_date_year'];
        $this->end_date_month= $json['end_date_month'];
        $this->end_date_day= $json['end_date_day'];
        $this->time= $json['time'];
        $this->type= $json['type'];
        $this->cancelled= $json['cancelled'];
        $this->setlist= $json['setlist'];
        $this->comment= $json['comment'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];
        $this->ended= $json['ended'];

        }
    }
}

?>
