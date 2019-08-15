<?php
require_once "DBObject.php";

/********************************************
 * Release_group_secondary_type_join represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Release_group_secondary_type_join extends DBObject
{    
    public $release_group=0;
    public $secondary_type=0;
    public $created="";



    /*****************************************************
     * Returns an HTTP parameter list for Release_group_secondary_type_join object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="release_group=".$this->release_group."&";
        $b.="secondary_type=".$this->secondary_type."&";
        $b.="created=".$this->created."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Release_group_secondary_type_join object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Release_group_secondary_type_join from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Release_group_secondary_type_join($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->release_group= $json['release_group'];
        $this->secondary_type= $json['secondary_type'];
        $this->created= $json['created'];

        }
    }
}

?>
