<?php
/** RunRCommandController.php
 * 	
 * 	Last Updated: 2015-01-07
 * 
 *  This controller is a bridge between PHP and R. It is expected
 *  to be used as a webservice and as such expects to receive
 *  R commands and data from outside. This will make security a
 *  high priority and as such there needs to be a white list of
 *  R commands and data sanitizers associated with this
 *  controller.
 * 
 *  For now, I will implement this in PHP. Eventually, it should probaby
 *  be moved to the database.
 * 
 *  Justin - jgiboney@gmail.com
 */


namespace app\controllers;
use Yii;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use yii\filters\Cors;
use yii\web\HeaderCollection;
use yii\data\ActiveDataProvider;
use app\models\User;

class RunRCommandController extends ActiveController
{
	public $modelClass = 'app\models\RunRCommand';
	
	private $commandWhiteList = array("Random-Histogram" => array(	"Script-File" 	=> "../r-scripts/random-histogram.R",
																	"Data-Required"	=> FALSE, 
																	"Required-Args" => array("N"), // Make sure these are in the order you want them to appear in the R script
																	"Filters" 		=> array("N" => FILTER_SANITIZE_NUMBER_INT)));	
	
	public function behaviors()
    {

        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' =>  QueryParamAuth::className(),
        ];
       
        return $behaviors;
    }
	
	public function actionRunRCommand($command, $data, $args)
    {
        if (!empty($_GET)) {
            $model = new $this->modelClass;
           
            try {
                if (key_exists($command, $commandWhiteList)) {
                	if ($commandWhiteList[$command]["Data-Required"] && ($data != "" || count($data) > 0)) {
                		$allRequiredArgsSubmitted = TRUE;
						$missingArgs = array();
						foreach ($commandWhiteList[$command]["Required-Args"] as $reqArg) {
							if (!key_exists($reqArg, $args)) {
								$allRequiredArgsSubmitted = FALSE;
								array_push($missingArgs, $reqArg);
							}
						}
						
						if ($allRequiredArgsSubmitted) {
							$cleanedArgs = array();
							foreach ($args as $arg => $value) {
								if (key_exists($arg, $commandWhiteList[$command]["Filters"])) {
									$cleanedArgs[$arg] = filter_var($value,$commandWhiteList[$command]["Filters"][$arg]);
								}
							}
							
							// TO DO: 	We are going to need to do something with the data.
							// 			Likely, we will need to write it to a temporary file
							//			and pass the file in as a argument. Make sure that
							//			the data has been sanitized first.
							
							
							// Here is where we build the RScript command
							$commandString = "RScript " . $commandWhiteList[$command]["Script-File"];
							foreach ($cleanedArgs as $cleanedArg => $cleanedValue) {
								$commandString .= " " . $cleanedValue;
							}
							
							// Here is where we run the RScript command
							exec($commandString);
							
							
						} else {
							$errorMessage = 'The following arguments are missing: ';
							foreach ($missingArgs as $missingArg) {
								$errorMessage .= $missingArg;
								if ($errorMessage != 'The following arguments are missing: ') {   $errorMessage .= ', ';   }
							}
							throw new \yii\web\HttpException(400, $errorMessage);
						}
						
                	} else {
	                	throw new \yii\web\HttpException(400, 'There is not sufficient data for this R command.');
	                }

                } else {
                	throw new \yii\web\HttpException(400, 'That R command is not valid.');
                }
                
            } catch (Exception $ex) {
                throw new \yii\web\HttpException(500, 'Internal server error');
            }

            if ($provider->getCount() <= 0) {
                throw new \yii\web\HttpException(404, 'No entries found with this query string');
            } else {
                return $provider;
            }
        } else {
            throw new \yii\web\HttpException(400, 'No query strings were provided');
        }
    }
}

?>