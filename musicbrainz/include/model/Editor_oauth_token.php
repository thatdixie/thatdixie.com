<?php
require_once "DBObject.php";

/********************************************
 * Editor_oauth_token represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_oauth_token extends DBObject
{    
    public $id=0;
    public $editor=0;
    public $application=0;
    public $authorization_code="";
    public $refresh_token="";
    public $access_token="";
    public $expire_time="";
    public $scope=0;
    public $granted="";



    /*****************************************************
     * Returns an HTTP parameter list for Editor_oauth_token object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="editor=".$this->editor."&";
        $b.="application=".$this->application."&";
        $b.="authorization_code=".$this->authorization_code."&";
        $b.="refresh_token=".$this->refresh_token."&";
        $b.="access_token=".$this->access_token."&";
        $b.="expire_time=".$this->expire_time."&";
        $b.="scope=".$this->scope."&";
        $b.="granted=".$this->granted."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_oauth_token object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_oauth_token from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_oauth_token($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->editor= $json['editor'];
        $this->application= $json['application'];
        $this->authorization_code= $json['authorization_code'];
        $this->refresh_token= $json['refresh_token'];
        $this->access_token= $json['access_token'];
        $this->expire_time= $json['expire_time'];
        $this->scope= $json['scope'];
        $this->granted= $json['granted'];

        }
    }
}

?>
