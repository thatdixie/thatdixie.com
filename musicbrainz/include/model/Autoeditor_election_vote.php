<?php
require_once "DBObject.php";

/********************************************
 * Autoeditor_election_vote represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Autoeditor_election_vote extends DBObject
{    
    public $id=0;
    public $autoeditor_election=0;
    public $voter=0;
    public $vote=0;
    public $vote_time="";



    /*****************************************************
     * Returns an HTTP parameter list for Autoeditor_election_vote object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="autoeditor_election=".$this->autoeditor_election."&";
        $b.="voter=".$this->voter."&";
        $b.="vote=".$this->vote."&";
        $b.="vote_time=".$this->vote_time."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Autoeditor_election_vote object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Autoeditor_election_vote from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Autoeditor_election_vote($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->autoeditor_election= $json['autoeditor_election'];
        $this->voter= $json['voter'];
        $this->vote= $json['vote'];
        $this->vote_time= $json['vote_time'];

        }
    }
}

?>
