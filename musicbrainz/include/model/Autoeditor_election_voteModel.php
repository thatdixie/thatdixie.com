<?php
require_once "MusicbrainzDB.php";
require      "Autoeditor_election_vote.php";

/********************************************************************
 * Autoeditor_election_voteModel inherits MusicbrainzDB and provides functions to
 * map Autoeditor_election_vote class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Autoeditor_election_voteModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Autoeditor_election_vote by id
     *
     * @return autoeditor_election_vote
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "autoeditor_election,".
                      "voter,".
                      "vote,".
                      "vote_time ".                      		               
	       "FROM autoeditor_election_vote ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Autoeditor_election_vote"));
    }

    /*********************************************************
     * Insert a new Autoeditor_election_vote into musicbrainz database
     *
     * @param $autoeditor_election_vote
     * @return n/a
     *********************************************************
     */
    public function insert($autoeditor_election_vote)
    {
        $query="INSERT INTO autoeditor_election_vote ( ".
	              "id,".
                      "autoeditor_election,".
                      "voter,".
                      "vote,".
                      "vote_time ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$autoeditor_election_vote->autoeditor_election." ,".
                      " ".$autoeditor_election_vote->voter." ,".
                      " ".$autoeditor_election_vote->vote." ,".
                      "'".$this->sqlSafe($autoeditor_election_vote->vote_time)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Autoeditor_election_vote into musicbrainz database
     * and return a Autoeditor_election_vote with new autoincrement
     * primary key
     *
     * @param  $autoeditor_election_vote
     * @return $autoeditor_election_vote
     *********************************************************
     */
    public function insert2($autoeditor_election_vote)
    {
        $query="INSERT INTO autoeditor_election_vote ( ".
	              "id,".
                      "autoeditor_election,".
                      "voter,".
                      "vote,".
                      "vote_time ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$autoeditor_election_vote->autoeditor_election." ,".
                      " ".$autoeditor_election_vote->voter." ,".
                      " ".$autoeditor_election_vote->vote." ,".
                      "'".$this->sqlSafe($autoeditor_election_vote->vote_time)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $autoeditor_election_vote->id = $id;
	    return($autoeditor_election_vote);	
    }


    /*********************************************************
     * Update a Autoeditor_election_vote in musicbrainz database
     *
     * @param $autoeditor_election_vote
     * @return n/a
     *********************************************************
     */
    public function update($autoeditor_election_vote)
    {
        $query="UPDATE  autoeditor_election_vote ".
	          "SET ".
                      "id= ".$autoeditor_election_vote->id." ,".
                      "autoeditor_election= ".$autoeditor_election_vote->autoeditor_election." ,".
                      "voter= ".$autoeditor_election_vote->voter." ,".
                      "vote= ".$autoeditor_election_vote->vote." ,".
                      "vote_time='".$this->sqlSafe($autoeditor_election_vote->vote_time)."' ".                      
	          "WHERE id=".$autoeditor_election_vote->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Autoeditor_election_vote by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM autoeditor_election_vote WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>