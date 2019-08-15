<?php
require_once "DBObject.php";

/********************************************
 * Artist represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Artist extends DBObject
{    
    public $id=0;
    public $gid="";
    public $name="";
    public $sort_name="";
    public $begin_date_year=0;
    public $begin_date_month=0;
    public $begin_date_day=0;
    public $end_date_year=0;
    public $end_date_month=0;
    public $end_date_day=0;
    public $type=0;
    public $area=0;
    public $gender=0;
    public $comment="";
    public $edits_pending=0;
    public $last_updated="";
    public $ended="";
    public $begin_area=0;
    public $end_area=0;



    /*****************************************************
     * Returns an HTTP parameter list for Artist object
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
        $b.="sort_name=".$this->sort_name."&";
        $b.="begin_date_year=".$this->begin_date_year."&";
        $b.="begin_date_month=".$this->begin_date_month."&";
        $b.="begin_date_day=".$this->begin_date_day."&";
        $b.="end_date_year=".$this->end_date_year."&";
        $b.="end_date_month=".$this->end_date_month."&";
        $b.="end_date_day=".$this->end_date_day."&";
        $b.="type=".$this->type."&";
        $b.="area=".$this->area."&";
        $b.="gender=".$this->gender."&";
        $b.="comment=".$this->comment."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        $b.="ended=".$this->ended."&";
        $b.="begin_area=".$this->begin_area."&";
        $b.="end_area=".$this->end_area."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Artist object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Artist from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Artist($jsonString='')
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
        $this->sort_name= $json['sort_name'];
        $this->begin_date_year= $json['begin_date_year'];
        $this->begin_date_month= $json['begin_date_month'];
        $this->begin_date_day= $json['begin_date_day'];
        $this->end_date_year= $json['end_date_year'];
        $this->end_date_month= $json['end_date_month'];
        $this->end_date_day= $json['end_date_day'];
        $this->type= $json['type'];
        $this->area= $json['area'];
        $this->gender= $json['gender'];
        $this->comment= $json['comment'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];
        $this->ended= $json['ended'];
        $this->begin_area= $json['begin_area'];
        $this->end_area= $json['end_area'];

        }
    }
}

?>
