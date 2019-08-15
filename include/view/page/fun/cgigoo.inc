<?php

/*********************************
 * cgigoo.inc
 * @author megan
 *********************************
*/
function cgigoo()
{
?>
    <div id="home">
      <p><br><br><br><br></p>
      <div class="container">
        <div class="center">
          <div class="col-md-6 col-md-offset-3">
            <p><br><br></p>
            <h2>CGI GOO</h2>
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
                <td width="500">&nbsp; SERVER SOFTWARE</td>
                <td width="1000"><?php echo "&nbsp;".getServerSoftware()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; SERVER NAME</td>
                <td><?php echo "&nbsp;".getServerName()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; GATEWAY</td>
                <td><?php echo "&nbsp;".getGatewayInterface()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; PROTOCOL</td>
                <td><?php echo "&nbsp;".getServerProtocol()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; PORT</td>
                <td><?php echo "&nbsp;".getServerPort()."\n";?>
              </tr>    
              <tr>
                <td>&nbsp; REQUEST METHOD</td>
                <td><?php echo "&nbsp;".getRequestMethod()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; DOCUMENT ROOT</td>
                <td><?php echo "&nbsp;".getDocumentRoot()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; PATH INFO</td>
                <td><?php echo "&nbsp;".getPathInfo()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; PATH TRANSLATED</td>
                <td><?php echo "&nbsp;".getPathTranslated()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; SCRIPT-NAME</td>
                <td><?php echo "&nbsp;".getScriptName()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; QUERY STRING</td>
                <td><?php echo "&nbsp;".getQueryString()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; REMOTE HOST</td>
                <td><?php echo "&nbsp;".getRemoteHost()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; REMOTE ADDRESS</td>
                <td><?php echo "&nbsp;".getRemoteAddr()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; AUTH TYPE</td>
                <td><?php echo "&nbsp;".getAuthType()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; REMOTE USER</td>
                <td><?php echo "&nbsp;".getRemoteUser()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; REMOTE IDENT</td>
                <td><?php echo "&nbsp;".getRemoteIdent()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; CONTENT TYPE</td>
                <td><?php echo "&nbsp;".getContentType()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; CONTENT LENGTH</td>
                <td><?php echo "&nbsp;".getContentLength()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; ACCEPT</td>
                <td><?php echo "&nbsp;".getAccept()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; USER AGENT</td>
                <td><?php echo "&nbsp;".getUserAgent()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; REDIRECT REQUEST</td>
                <td><?php echo "&nbsp;".getRedirectRequest()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; REDIRECT URL</td>
                <td><?php echo "&nbsp;".getRedirectURL();?>
              </tr>
              <tr>
                <td>&nbsp; REDIRECT STATUS</td>
                <td><?php echo "&nbsp;".getRedirectStatus()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; REFERRER</td>
                <td><?php echo "&nbsp;".getReferrer()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; COOKIE</td>
                <td><?php echo "&nbsp;".getCookie()."\n";?>
              </tr>
              <tr>
                <td>&nbsp; USING HTTPS</td>
                <td><?php echo "&nbsp;".getUsingHTTPS()."\n";?>
              </tr>    
            </table>
            </font>
            <p><br><br><br><br></p>
    </div>
<?php
}
?>