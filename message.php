<?php include "./templates/header.php";
    
    
    $ID = $_SESSION['userid'];

	if(!isset($_SESSION["connected"]))
     header("Location: index.php");


    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require './vendor/autoload.php';

    $app = new \Slim\App;

    $handler = function (Request $request, Response $response) {
        $params = $request->getParsedBody();
        // Fall back to query parameters if needed
        if (!count($params)){
            $params = $request->getQueryParams();
        }
        error_log(print_r($params, true));
        return $response->withStatus(204);
    };

    $sql = "SELECT * FROM messages WHERE userid='$ID'";
    $result = $mysqli->query($sql);
    try{
        $app->get('https://d4901c73.ngrok.io/message.php', $handler);
        $app->post('https://d4901c73.ngrok.io/message.php', $handler);

        $app->run();

    } catch(Exception $e)
    {
        echo "The message was not sent. Error: " . $e->getMessage() . "\n";
    }
    
    $From = $_GET['msisdn'];
    $Message = $_GET['text'];



?>

        <h1 class="col-sm-6 offset-sm-3 text-center py-4">Messages</h1>

        <?php while($rows = $result->fetch_assoc()) { ?>
        <table class="table table-bordered" style="align-center">
            <tbody class="bg-light">
                <tr>
                    <td class="text-left" id="recipicent" name="recipicent"><label id="recipicent" name="recipicent" for="recipicent">Recipicent</label></td>
                </tr>
                <tr>
                    <td class="text-left" id="recipicent" name="recipicent"><?php echo $rows["recipicent"];?></td> 
                </tr>
                <br>    
                <tr>
                    <td class="text-left" id="text" name="text"><label id="text" name="text" for="text">Text</label></td>
                </tr>
                <tr>
                    <td class="text-left" id="text" name="text"><?php echo $rows["text"];?></td>
                </tr>
                <br>
                <?php } ?>
            </tbody>
        </table>
        

<?php include "./templates/footer.php";
?>