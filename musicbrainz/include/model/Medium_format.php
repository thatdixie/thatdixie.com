<?php
require_once "DBObject.php";

/********************************************
 * Medium_format represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Medium_format extends DBObject
{    
    public $id=0;
    public $name="";
    public $parent=0;
    public $child_order=0;
    public $year=0;
    public $has_discids="";
    public $description="";
    public $gid="";



    /*****************************************************
     * Returns an HTTP parameter list for Medium_format object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="name=".$this->name."&";
        $b.="parent=".$this->parent."&";
        $b.="child_order=".$this->child_order."&";
        $b.="year=".$this->year."&";
        $b.="has_discids=".$this->has_discids."&";
        $b.="description=".$this->description."&";
        $b.="gid=".$this->gid."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Medium_format object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Medium_format from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Medium_format($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->name= $json['name'];
        $this->parent= $json['parent'];
        $this->child_order= $json['child_order'];
        $this->year= $json['year'];
        $this->has_discids= $json['has_discids'];
        $this->description= $json['description'];
        $this->gid= $json['gid'];

        }
    }
}

?>
