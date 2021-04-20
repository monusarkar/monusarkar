
<?php

require_once('vendor/autoload.php');
use \Firebase\JWT\JWT;
session_start();  
$session_id=session_id();



$key = "waeroonasieHou1choowa1Ha";
$payload = array( 
 
  "username"=> 'name',
  "nickname"=> "student",
  "template"=> "default",
  "role"=>"student",
  "id"=>$session_id,
  "subject"=> "Subject",
  "tags"=> array("student1")

);

/**
 * IMPORTANT:
 * You must specify supported algorithms for your application. See
 * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
 * for a list of spec-compliant algorithms.
 */
$jwt = JWT::encode($payload, $key);
$decoded = JWT::decode($jwt, $key, array('HS256'));



/*
 NOTE: This will now be an object instead of an associative array. To get
 an associative array, you will need to cast it as such:
*/

$decoded_array = (array) $decoded;

/**
 * You can add a leeway to account for when there is a clock skew times between
 * the signing and verifying servers. It is recommended that this leeway should
 * not be bigger than a few minutes.
 *
 * Source: http://self-issued.info/docs/draft-ietf-oauth-json-web-token.html#nbfDef
 */
JWT::$leeway = 60; // $leeway in seconds
$decoded = JWT::decode($jwt, $key, array('HS256'));


?>
<script src="https://tagscores.proctoring.online/sdk/supervisor.js"></script>

<script>
  // create an instance of the Supervisor class

  
  var data="<?php echo $jwt; ?>";
 var supervisor = new Supervisor({
    url: 'https://tagscores.proctoring.online'
  });
  // initializing a proctoring session
  // the token field you can specify a string, 
  // a function or a promise
  supervisor.init({
    // to indicate that data is transmitted in the format of a JWT
    provider: 'jwt',
    // get string with JWT token from your server
    // your server side must have the appropriate API implemented
    token: data //fetch('/api/token').then(function(response) {
      //if (response.ok) return response.text();
     // else throw Error('Failed to get JWT');
    //})
  }).then(function() {
    // start proctoring session immediately after initialization
    return supervisor.start();
  }).catch(function(err) {
    // in case of an error, display the appropriate message
    alert(err.toString());
    // redirect to home page,
    // to prevent the test from starting without proctoring
    //location.href = '/';
  });
 
</script>
