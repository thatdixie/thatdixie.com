<?php
require_once "DBObject.php";

/********************************************
 * Editor_collection_series represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_collection_series extends DBObject
{    
    public $collection=0;
    public $series=0;



    /*****************************************************
     * Returns an HTTP parameter list for Editor_collection_series object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="collection=".$this->collection."&";
        $b.="series=".$this->series."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_collection_series object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_collection_series from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_collection_series($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->collection= $json['collection'];
        $this->series= $json['series'];

        }
    }
}

?>
