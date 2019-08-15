<?php
require_once "DBObject.php";

/********************************************
 * Series_gid_redirect represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Series_gid_redirect extends DBObject
{    
    public $gid="";
    public $new_id=0;
    public $created="";



    /*****************************************************
     * Returns an HTTP parameter list for Series_gid_redirect object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="gid=".$this->gid."&";
        $b.="new_id=".$this->new_id."&";
        $b.="created=".$this->created."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Series_gid_redirect object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Series_gid_redirect from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Series_gid_redirect($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->gid= $json['gid'];
        $this->new_id= $json['new_id'];
        $this->created= $json['created'];

        }
    }
}

?>
