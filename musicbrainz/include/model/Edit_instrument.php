<?php
require_once "DBObject.php";

/********************************************
 * Edit_instrument represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Edit_instrument extends DBObject
{    
    public $edit=0;
    public $instrument=0;



    /*****************************************************
     * Returns an HTTP parameter list for Edit_instrument object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="edit=".$this->edit."&";
        $b.="instrument=".$this->instrument."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Edit_instrument object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Edit_instrument from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Edit_instrument($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->edit= $json['edit'];
        $this->instrument= $json['instrument'];

        }
    }
}

?>
