<?php
require_once "DBObject.php";

/********************************************
 * Replication_control represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Replication_control extends DBObject
{    
    public $id=0;
    public $current_schema_sequence=0;
    public $current_replication_sequence=0;
    public $last_replication_date="";



    /*****************************************************
     * Returns an HTTP parameter list for Replication_control object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="current_schema_sequence=".$this->current_schema_sequence."&";
        $b.="current_replication_sequence=".$this->current_replication_sequence."&";
        $b.="last_replication_date=".$this->last_replication_date."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Replication_control object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Replication_control from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Replication_control($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->current_schema_sequence= $json['current_schema_sequence'];
        $this->current_replication_sequence= $json['current_replication_sequence'];
        $this->last_replication_date= $json['last_replication_date'];

        }
    }
}

?>
