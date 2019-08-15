<?php
require_once "DBObject.php";

/********************************************
 * Work_alias represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Work_alias extends DBObject
{    
    public $id=0;
    public $work=0;
    public $name="";
    public $locale="";
    public $edits_pending=0;
    public $last_updated="";
    public $type=0;
    public $sort_name="";
    public $begin_date_year=0;
    public $begin_date_month=0;
    public $begin_date_day=0;
    public $end_date_year=0;
    public $end_date_month=0;
    public $end_date_day=0;
    public $primary_for_locale="";
    public $ended="";



    /*****************************************************
     * Returns an HTTP parameter list for Work_alias object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="work=".$this->work."&";
        $b.="name=".$this->name."&";
        $b.="locale=".$this->locale."&";
        $b.="edits_pending=".$this->edits_pending."&";
        $b.="last_updated=".$this->last_updated."&";
        $b.="type=".$this->type."&";
        $b.="sort_name=".$this->sort_name."&";
        $b.="begin_date_year=".$this->begin_date_year."&";
        $b.="begin_date_month=".$this->begin_date_month."&";
        $b.="begin_date_day=".$this->begin_date_day."&";
        $b.="end_date_year=".$this->end_date_year."&";
        $b.="end_date_month=".$this->end_date_month."&";
        $b.="end_date_day=".$this->end_date_day."&";
        $b.="primary_for_locale=".$this->primary_for_locale."&";
        $b.="ended=".$this->ended."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Work_alias object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Work_alias from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Work_alias($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->work= $json['work'];
        $this->name= $json['name'];
        $this->locale= $json['locale'];
        $this->edits_pending= $json['edits_pending'];
        $this->last_updated= $json['last_updated'];
        $this->type= $json['type'];
        $this->sort_name= $json['sort_name'];
        $this->begin_date_year= $json['begin_date_year'];
        $this->begin_date_month= $json['begin_date_month'];
        $this->begin_date_day= $json['begin_date_day'];
        $this->end_date_year= $json['end_date_year'];
        $this->end_date_month= $json['end_date_month'];
        $this->end_date_day= $json['end_date_day'];
        $this->primary_for_locale= $json['primary_for_locale'];
        $this->ended= $json['ended'];

        }
    }
}

?>
