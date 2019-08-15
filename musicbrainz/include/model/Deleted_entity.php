<?php
require_once "DBObject.php";

/********************************************
 * Deleted_entity represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Deleted_entity extends DBObject
{    
    public $gid="";
    public $data="";
    public $deleted_at="";



    /*****************************************************
     * Returns an HTTP parameter list for Deleted_entity object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="gid=".$this->gid."&";
        $b.="data=".$this->data."&";
        $b.="deleted_at=".$this->deleted_at."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Deleted_entity object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Deleted_entity from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Deleted_entity($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->gid= $json['gid'];
        $this->data= $json['data'];
        $this->deleted_at= $json['deleted_at'];

        }
    }
}

?>
