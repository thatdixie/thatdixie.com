<?php
require_once "DBObject.php";

/********************************************
 * Edit_data represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Edit_data extends DBObject
{    
    public $edit=0;
    public $data="";



    /*****************************************************
     * Returns an HTTP parameter list for Edit_data object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="edit=".$this->edit."&";
        $b.="data=".$this->data."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Edit_data object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Edit_data from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Edit_data($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->edit= $json['edit'];
        $this->data= $json['data'];

        }
    }
}

?>
