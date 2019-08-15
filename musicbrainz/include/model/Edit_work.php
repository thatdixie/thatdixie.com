<?php
require_once "DBObject.php";

/********************************************
 * Edit_work represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Edit_work extends DBObject
{    
    public $edit=0;
    public $work=0;



    /*****************************************************
     * Returns an HTTP parameter list for Edit_work object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="edit=".$this->edit."&";
        $b.="work=".$this->work."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Edit_work object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Edit_work from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Edit_work($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->edit= $json['edit'];
        $this->work= $json['work'];

        }
    }
}

?>
