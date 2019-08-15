<?php
require_once "DBObject.php";

/********************************************
 * Vote represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Vote extends DBObject
{    
    public $id=0;
    public $editor=0;
    public $edit=0;
    public $vote=0;
    public $vote_time="";
    public $superseded="";



    /*****************************************************
     * Returns an HTTP parameter list for Vote object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="editor=".$this->editor."&";
        $b.="edit=".$this->edit."&";
        $b.="vote=".$this->vote."&";
        $b.="vote_time=".$this->vote_time."&";
        $b.="superseded=".$this->superseded."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Vote object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Vote from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Vote($jsonString='')
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
        $this->edit= $json['edit'];
        $this->vote= $json['vote'];
        $this->vote_time= $json['vote_time'];
        $this->superseded= $json['superseded'];

        }
    }
}

?>
