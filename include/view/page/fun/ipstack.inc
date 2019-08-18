<?php

/*********************************
 * ipstack.inc
 * @author megan
 *********************************
*/
function ipstack()
{
    //-----------------------------------------------
    // REST API call to ipstack.com using
    // access key and users IP address
    // $userInfo has resulting object
    //-----------------------------------------------
    $restUrl   ="http://api.ipstack.com/";
    $accessKey ="8ea7d0e7cbd5c95cdb983b6df5f00664";
    $userIp    = getRemoteAddr();
    $userInfo  = json_decode(file_get_contents($restUrl."/".$userIp."?access_key=".$accessKey ), TRUE);    
?>
    <div id="home">
      <p><br><br><br><br></p>
      <div class="container">
        <div class="center">
          <div class="col-md-6 col-md-offset-3">
            <p><br><br></p>
            <h2>ipstack.com REST API Results</h2>
          </div>
        </div>
      </div>
            <font size="+2" color="black">
            <table align="center"
              border="10px"
              frame="box"
              style="border-color:pink"
              width="95%">
              <tr>
                <td width="500">&nbsp; IP ADDRESS</td>
                <td width="1000"><?php echo "&nbsp;".$userInfo['ip']."\n";?>
              </tr>
              <tr>
                <td>&nbsp; STATE</td>
                <td><?php echo "&nbsp;".$userInfo['region_name']."\n";?>
              </tr>
              <tr>
                <td>&nbsp; STATE CODE</td>
                <td><?php echo "&nbsp;".$userInfo['region_code']."\n";?>
              </tr>
              <tr>
                <td>&nbsp; CITY</td>
                <td><?php echo "&nbsp;".$userInfo['city']."\n";?>
              </tr>
              <tr>
                <td>&nbsp; ZIP</td>
                <td><?php echo "&nbsp;".$userInfo['zip']."\n";?>
              </tr>    
              <tr>
              <tr>
                <td>&nbsp; COUNTRY</td>
                <td><?php echo "&nbsp;".$userInfo['country_name']."\n";?>
              </tr>    
              <tr>
                <td>&nbsp; LONGITUDE</td>
                <td><?php echo "&nbsp;".$userInfo['longitude']."\n";?>
              </tr>
              <tr>
              <tr>
                <td>&nbsp; LATITUDE</td>
                <td><?php echo "&nbsp;".$userInfo['latitude']."\n";?>
              </tr>
            </table>
            </font>
            <p><br><br><br><br></p>
    </div>
<?php
}
?>