<?php
require_once "DBObject.php";

/********************************************
 * Work_attribute represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Work_attribute extends DBObject
{    
    public $id=0;
    public $work=0;
    public $work_attribute_type=0;
    public $work_attribute_type_allowed_value=0;
    public $work_attribute_text="";



    /*****************************************************
     * Returns an HTTP parameter list for Work_attribute object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="work=".$this->work."&";
        $b.="work_attribute_type=".$this->work_attribute_type."&";
        $b.="work_attribute_type_allowed_value=".$this->work_attribute_type_allowed_value."&";
        $b.="work_attribute_text=".$this->work_attribute_text."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Work_attribute object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Work_attribute from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Work_attribute($jsonString='')
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
        $this->work_attribute_type= $json['work_attribute_type'];
        $this->work_attribute_type_allowed_value= $json['work_attribute_type_allowed_value'];
        $this->work_attribute_text= $json['work_attribute_text'];

        }
    }
}

?>
