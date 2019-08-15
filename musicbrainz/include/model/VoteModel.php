<?php
require_once "MusicbrainzDB.php";
require      "Vote.php";

/********************************************************************
 * VoteModel inherits MusicbrainzDB and provides functions to
 * map Vote class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class VoteModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Vote by id
     *
     * @return vote
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "editor,".
                      "edit,".
                      "vote,".
                      "vote_time,".
                      "superseded ".                      		               
	       "FROM vote ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Vote"));
    }

    /*********************************************************
     * Insert a new Vote into musicbrainz database
     *
     * @param $vote
     * @return n/a
     *********************************************************
     */
    public function insert($vote)
    {
        $query="INSERT INTO vote ( ".
	              "id,".
                      "editor,".
                      "edit,".
                      "vote,".
                      "vote_time,".
                      "superseded ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$vote->editor." ,".
                      " ".$vote->edit." ,".
                      " ".$vote->vote." ,".
                      "'".$this->sqlSafe($vote->vote_time)."',".
                      "'".$this->sqlSafe($vote->superseded)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Vote into musicbrainz database
     * and return a Vote with new autoincrement
     * primary key
     *
     * @param  $vote
     * @return $vote
     *********************************************************
     */
    public function insert2($vote)
    {
        $query="INSERT INTO vote ( ".
	              "id,".
                      "editor,".
                      "edit,".
                      "vote,".
                      "vote_time,".
                      "superseded ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$vote->editor." ,".
                      " ".$vote->edit." ,".
                      " ".$vote->vote." ,".
                      "'".$this->sqlSafe($vote->vote_time)."',".
                      "'".$this->sqlSafe($vote->superseded)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $vote->id = $id;
	    return($vote);	
    }


    /*********************************************************
     * Update a Vote in musicbrainz database
     *
     * @param $vote
     * @return n/a
     *********************************************************
     */
    public function update($vote)
    {
        $query="UPDATE  vote ".
	          "SET ".
                      "id= ".$vote->id." ,".
                      "editor= ".$vote->editor." ,".
                      "edit= ".$vote->edit." ,".
                      "vote= ".$vote->vote." ,".
                      "vote_time='".$this->sqlSafe($vote->vote_time)."',".
                      "superseded='".$this->sqlSafe($vote->superseded)."' ".                      
	          "WHERE id=".$vote->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Vote by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM vote WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>