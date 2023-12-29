<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Collection/Memory.php';
require_once FCPATH . 'vendor/psr/simple-cache/src/CacheInterface.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/AddressRange.php';
// require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Collection/Memory/SimpleCache1.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/Validations.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Functions.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/Coordinate.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IComparable.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Supervisor.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/Date.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/RichText/ITextElement.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/RichText/TextElement.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/RichText/Run.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/RichText/RichText.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/Properties.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/Theme.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/BaseParserClass.php';

require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/NumberFormat/NumberFormatter.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/NumberFormat/Formatter.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/WorkbookView.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/CellAddress.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/Hyperlink.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/Hyperlinks.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/DataValidation.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/DataValidations.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/PageSetup.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/IValueBinder.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/DefaultValueBinder.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/IgnoredErrors.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/DataType.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/Cell.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/ColumnAndRowAttributes.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/SheetViewOptions.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/SheetViews.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/Styles.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Protection.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/NumberFormat.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Alignment.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Border.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Borders.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Fill.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Color.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Font.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Style.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Document/Security.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/IntOrFloat.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Document/Properties.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/AutoFilter/Column/Rule.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/AutoFilter.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/Dimension.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/ColumnDimension.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/RowDimension.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/Protection.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/SheetView.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/HeaderFooter.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/PageSetup.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/PageMargins.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Collection/Memory/SimpleCache3.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Settings.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Collection/Cells.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Collection/CellsFactory.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/StringHelper.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IComparable.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/Worksheet.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Theme.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Engine/BranchPruner.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Engine/Logger.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Engine/CyclicReferenceStack.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Category.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Calculation.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/File.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Security/XmlScanner.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/ReferenceHelper.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx/Namespaces.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/IReadFilter.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/DefaultReadFilter.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/IReader.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/BaseReader.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Xlsx.php';
require_once FCPATH . 'vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Reader/Csv.php';



require_once FCPATH . 'vendor/masterminds/html5/src/HTML5/Entities.php';
require_once FCPATH . 'vendor/masterminds/html5/src/HTML5/Parser/CharacterReference.php';
require_once FCPATH . 'vendor/masterminds/html5/src/HTML5/Elements.php';
require_once FCPATH . 'vendor/masterminds/html5/src/HTML5/Parser/Tokenizer.php';
require_once FCPATH . 'vendor/masterminds/html5/src/HTML5/Parser/UTF8Utils.php';
require_once FCPATH . 'vendor/masterminds/html5/src/HTML5/Parser/Scanner.php';
require_once FCPATH . 'vendor/masterminds/html5/src/HTML5/Parser/TreeBuildingRules.php';
require_once FCPATH . 'vendor/masterminds/html5/src/HTML5/Parser/EventHandler.php';
require_once FCPATH . 'vendor/masterminds/html5/src/HTML5/Parser/DOMTreeBuilder.php';
require_once FCPATH . 'vendor/masterminds/html5/src/HTML5.php';
require_once FCPATH . 'vendor/symfony/dom-crawler/Crawler.php';
require_once FCPATH . 'vendor/symfony/browser-kit/Cookie.php';
require_once FCPATH . 'vendor/symfony/http-client-contracts/ChunkInterface.php';
require_once FCPATH . 'vendor/symfony/http-client/Chunk/DataChunk.php';
require_once FCPATH . 'vendor/symfony/http-client/Chunk/LastChunk.php';
require_once FCPATH . 'vendor/symfony/http-client/Chunk/FirstChunk.php';
require_once FCPATH . 'vendor/symfony/http-client/Internal/Canary.php';
require_once FCPATH . 'vendor/symfony/http-client/Response/StreamableInterface.php';
require_once FCPATH . 'vendor/symfony/http-client-contracts/ResponseInterface.php';
require_once FCPATH . 'vendor/symfony/http-client/Response/TransportResponseTrait.php';
require_once FCPATH . 'vendor/symfony/http-client/Response/CommonResponseTrait.php';
require_once FCPATH . 'vendor/symfony/http-client/Response/CurlResponse.php';
require_once FCPATH . 'vendor/symfony/browser-kit/Response.php';
require_once FCPATH . 'vendor/symfony/browser-kit/Request.php';
require_once FCPATH . 'vendor/symfony/http-client/Internal/DnsCache.php';
require_once FCPATH . 'vendor/symfony/http-client/Internal/ClientState.php';
require_once FCPATH . 'vendor/symfony/http-client/Internal/CurlClientState.php';
require_once FCPATH . 'vendor/symfony/service-contracts/ResetInterface.php';
require_once FCPATH . 'vendor/psr/log/src/LoggerAwareInterface.php';
require_once FCPATH . 'vendor/symfony/http-client-contracts/HttpClientInterface.php';
require_once FCPATH . 'vendor/symfony/http-client/HttpClientTrait.php';
require_once FCPATH . 'vendor/symfony/http-client/CurlHttpClient.php';
require_once FCPATH . 'vendor/symfony/http-client/HttpClient.php';
require_once FCPATH . 'vendor/symfony/browser-kit/Exception/ExceptionInterface.php';
require_once FCPATH . 'vendor/symfony/browser-kit/Exception/LogicException.php';
require_once FCPATH . 'vendor/symfony/browser-kit/CookieJar.php';
require_once FCPATH . 'vendor/symfony/browser-kit/History.php';
require_once FCPATH . 'vendor/symfony/browser-kit/AbstractBrowser.php';
require_once FCPATH . 'vendor/symfony/browser-kit/HttpBrowser.php';


require_once FCPATH . 'vendor/symfony/process/ExecutableFinder.php';
require_once FCPATH . 'vendor/symfony/panther/src/ProcessManager/BrowserManagerInterface.php';
require_once FCPATH . 'vendor/symfony/panther/src/ProcessManager/WebServerReadinessProbeTrait.php';
require_once FCPATH . 'vendor/symfony/panther/src/ProcessManager/ChromeManager.php';
require_once FCPATH . 'vendor/symfony/panther/src/ExceptionThrower.php';
require_once FCPATH . 'vendor/symfony/dom-crawler/AbstractUriElement.php';
require_once FCPATH . 'vendor/symfony/dom-crawler/Link.php';
require_once FCPATH . 'vendor/symfony/dom-crawler/Form.php';
require_once FCPATH . 'vendor/symfony/dom-crawler/Image.php';
require_once FCPATH . 'vendor/symfony/panther/src/DomCrawler/Form.php';
require_once FCPATH . 'vendor/symfony/panther/src/DomCrawler/Image.php';
require_once FCPATH . 'vendor/symfony/panther/src/DomCrawler/Link.php';
require_once FCPATH . 'vendor/php-webdriver/webdriver/lib/WebDriverSearchContext.php';
require_once FCPATH . 'vendor/php-webdriver/webdriver/lib/WebDriverElement.php';
require_once FCPATH . 'vendor/symfony/panther/src/DomCrawler/Crawler.php';
require_once FCPATH . 'vendor/symfony/panther/src/Cookie/CookieJar.php';
require_once FCPATH . 'vendor/php-webdriver/webdriver/lib/WebDriverHasInputDevices.php';
require_once FCPATH . 'vendor/php-webdriver/webdriver/lib/JavaScriptExecutor.php';
require_once FCPATH . 'vendor/php-webdriver/webdriver/lib/WebDriver.php';
require_once FCPATH . 'vendor/symfony/panther/src/ExceptionThrower.php';
require_once FCPATH . 'vendor/symfony/panther/src/Client.php';

require_once FCPATH . 'vendor/orhanerday/open-ai/src/Url.php';
require_once FCPATH . 'vendor/orhanerday/open-ai/src/OpenAi.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv as Reader_csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader_xlsx;
use Orhanerday\OpenAi\OpenAi;
/**
 * @property Load $load
 */

class ItemCRUD extends CI_Controller
{
	public $pid;
    public $itemCRUD;
    public $hist_id = '';

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('ItemCRUDModel');
		$this->load->helper('url');

        $this->itemCRUD = new ItemCRUDModel;
		$this->pid = "";
    }

    /**
     * Display Data this method.
     *
     * @return Response
     */
    public function index()
    {
        $data['data'] = $this->itemCRUD->get_itemCRUD();

        $this->load->helper('url');
        redirect('ItemCRUD/westin');
    }

    public function indeed() {
        $data['data'] = $this->itemCRUD->get_indeed();

        $this->load->helper('url');
        $this->load->view('default/header');
        $this->load->view('itemCRUD/indeed', $data);
        $this->load->view('default/footer');
    }

    public function careerjet() {
        $data['data'] = $this->itemCRUD->get_careerjet();

        $this->load->helper('url');
        $this->load->view('default/header');
        $this->load->view('itemCRUD/careerjet', $data);
        $this->load->view('default/footer');
    }

    public function jobisjob() {
        $data['data'] = $this->itemCRUD->get_jobisjob();

        $this->load->helper('url');
        $this->load->view('default/header');
        $this->load->view('itemCRUD/jobisjob', $data);
        $this->load->view('default/footer');
    }
    public function usajobs() {
        $data['data'] = $this->itemCRUD->get_usajobs();

        $this->load->helper('url');
        $this->load->view('default/header');
        $this->load->view('itemCRUD/usajobs', $data);
        $this->load->view('default/footer');
    }
    public function jobsintrucks() {
        $data['data'] = $this->itemCRUD->get_jobsintrucks();

        $this->load->helper('url');
        $this->load->view('default/header');
        $this->load->view('itemCRUD/jobsintrucks', $data);
        $this->load->view('default/footer');
    }
    public function alltruckjobs() {
        $data['data'] = $this->itemCRUD->get_alltruckjobs();

        $this->load->helper('url');
        $this->load->view('default/header');
        $this->load->view('itemCRUD/alltruckjobs', $data);
        $this->load->view('default/footer');
    }
    public function coolworks() {
        $data['data'] = $this->itemCRUD->get_coolworks();

        $this->load->helper('url');
        $this->load->view('default/header');
        $this->load->view('itemCRUD/coolworks', $data);
        $this->load->view('default/footer');
    }
	public function westin() {
        $data['flag'] = false;
		// $res = $this->itemCRUD->select_title();
		// // var_dump($res[0]->title);
		// if(count($res) != 0) {
		// 	$data['data'] = explode(',', $res[0]->title);
		// }
		// else{
			$data['data'] = [];
		// }

        $this->load->helper('url');
        $this->load->view('default/header');
        $this->load->view('itemCRUD/westin', $data);
        $this->load->view('default/footer2');
    }

	public function westin_post() {
        $data = $this->itemCRUD->get_westin();
		$html = '';
		$sn = 1;
		foreach($data as $item) {
			
			$html .= '
			<tr>
            <td>'. $sn .'</td>
            <td>'. $item->title.'</td>
            <td>'. $item->review.'</td>
            <td>'. $item->level.'</td>
            <td>'. $item->type.'</td>
            <td>'. $item->dest_location.'</td>
            <td>'. $item->direction.'</td>
            <td>'. $item->driving_time.'</td>
            <td>'. $item->walking_time.'</td>
            <td>'. $item->transit_time.'</td>
            <td>'. $item->cycling_time.'</td>
            <td>'. $item->latitude.'</td>
            <td>'. $item->longitude.'</td>
            <td>'. $item->website .'</td>  
            <td>'. $item->phoneNumber .'</td>  
			</tr>';
			$sn++;
		}
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
	
		echo json_encode($html);
    }
	public function westinSearch() {
        $postData = $this->input->post();
		// $data = $this->itemCRUD->getSearch($postData);
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		// echo json_encode($data);
    }

	public function westinStart() {
		// $output = null;
		// $returnCode = null;
		$req = $this->input->post();
		// var_dump($req);
		// $res = $this->getPrice();
		$count = 0;
		$category = explode(',', $req['category']);
		
		foreach($category as $i) {
			$du = null;
			$du1 = null;
			$djd = null;
			$djd1 = null;
			if($i != "") {
				$curl = curl_init('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$req['lat'].','.$req['lng']."&radius=".$req['radius'].'&keyword='. rawurlencode($i) .'&key=AIzaSyDs-0kCpaWs6MLA3beRKO690-NdIL_ubn0');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$du = curl_exec($curl);
				curl_close($curl);
				$count++;
				$djd = json_decode($du,true);
				$res = $this->itemCRUD->setInit($djd, $i, $req);

				$flag = true;
				if (isset($djd['next_page_token'])) {
					$next_token = $djd['next_page_token'];
					while($flag){
						$curl = curl_init('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$req['lat'].','.$req['lng'].'&radius='.$req['radius'].'&keyword='. rawurlencode($i) .'&key=AIzaSyDs-0kCpaWs6MLA3beRKO690-NdIL_ubn0&pagetoken='.$next_token);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
						$du1 = curl_exec($curl);
						curl_close($curl);
						$count++;
						$djd1 = json_decode($du1,true);
						if(isset($djd1['next_page_token'])){
							$next_token = $djd1['next_page_token'];
						}
						else {
							$flag = false;
						}
						$res = $this->itemCRUD->setInit($djd1, $i, $req);	
					}	 
				}
				// if(isset($djd['next_page_token'])){
				// 	$next_token = $djd['next_page_token'];
				// 	$curl = curl_init("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=".$req['lat'].",".$req['lng']."&radius=".$req['radius']."&keyword=". rawurlencode($i) ."&key=AIzaSyDs-0kCpaWs6MLA3beRKO690-NdIL_ubn0&pagetoken=".$next_token);
				// 	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				// 	$du1 = curl_exec($curl);
				// 	curl_close($curl);
				// 	$count++;
				// 	$djd1 = json_decode($du1,true);
				// 	if(isset($djd1['next_page_token'])){
				// 		$next_token = $djd1['next_page_token'];
				// 	}
				// 	$res = $this->itemCRUD->setInit($djd1, $i, $req);	
				// }
			}
		}
		$api_count = $this->itemCRUD->api_count($count);
		// if( $res == true) {
		// 	pclose(popen("start \"bla\" \"http:\\104.255.168.253\\py_scrape\\exe\\westin.exe\"" , 'r'));
		// 	$this->pid = (int)trim($output[0]);
		// 	$pidCmd = 'powershell.exe -command "(Get-WmiObject -Query \"SELECT ProcessId FROM Win32_Process WHERE Name = \'' . basename("C:\xampp\htdocs\py_scrape\exe\westin.exe") . '\").ProcessId"';
		// 	exec('C:/xampp/htdocs/py_scrape/exe/westin.exe > /dev/null 2>&1 &');
		// 	$command = escapeshellcmd('C:/xampp/htdocs/py_scrape/exe/westin.py');
		// 	$output = shell_exec($command);
			
		// }
		// $output =  shell_exec($command);
		// // $res = $this->itemCRUD->test_api();
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode($res);
		// $this->getPrice();
	}
	public function westinStartAgain() {
		$output = null;
		$returnCode = null;
		$req = $this->input->post();
		var_dump($req);
		$res = $this->itemCRUD->setInitAgain($req);																																																																													
		if( $res == true) {
			pclose(popen("start \"bla\" \"C:\\xampp\\htdocs\\py_scrape\\exe\\westin.exe\"" , 'r'));
		}
		;
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode(true);
	}

	public function westinStop() {
		$command = 'taskkill \F \IM "C:\\xampp\\htdocs\\py_scrape\\exe\\westin.exe"';
		shell_exec($command);
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode($command);
	}
	public function format() {
		$res = $this->itemCRUD->format1();
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode(true);
	}
	public function westin_table() {
		$postData = $this->input->post();
		
		$data = $this->itemCRUD->getTable($postData);
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode($data);
	}

	public function westin_search() {
		$postData = $this->input->post();
		
		$data = $this->itemCRUD->searchTable($postData);
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode($data);
	}

	public function scrape_post() {
		$req = $this->input->post();
		$data['data'] = $req;
		$data['flag'] = true;
		// var_dump($req);
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		$res = $this->itemCRUD->insert_title($req);
		// $this->load->view('default/header');
        // $this->load->view('itemCRUD/westin', $data);
        // $this->load->view('default/footer');
		redirect('ItemCRUD/westin');
		// echo json_encode(array('data'=> $req));
	}

	public function scrape_sel_post() {
		$req = $this->input->post('location');
		$res = $this->itemCRUD->insert_title($req);
		$data['flag'] = false;
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		$this->load->view('default/header');
        $this->load->view('itemCRUD/westin', $data);
        $this->load->view('default/footer2');
		echo json_encode($res);
	}
	public function search(){
		$res  = $this->itemCRUD->searchTitle();
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode(array('data'=>$res));
	}
	public function end() {
		$res = $this->itemCRUD->end();
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode(array('data'=>$res));
	}
	public function save() {
		$data['data']  = $this->itemCRUD->history();
		$this->load->view('default/header');
        $this->load->view('itemCRUD/history');
        $this->load->view('default/footer4');
	}
	public function save_result() {
		$req = $this->input->post();
		$res = $this->itemCRUD->save_result($req);
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode(array('data'=>$res));
	}

	public function init() {
		$res = $this->itemCRUD->init();
		echo json_encode($res);
	}
	public function view_list($id) {
		$this->hist_id =  $id;
		$data['data'] = $id;
		$this->load->helper('url');
        $this->load->view('default/header');
        $this->load->view('itemCRUD/westin_hist', $data);
        $this->load->view('default/footer1');
	}
	public function view_table($id) {
		$postData = $this->input->post();
		$data = $this->itemCRUD->viewTable($postData, $id);
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode($data);
	}
	public function excel_view() {
		$id = $this->input->post('id');
		$res = $this->itemCRUD->excel_view($id);
		
		echo json_encode($res);
	}
	public function delete_view() {
		$req = $this->input->post();
		$res = $this->itemCRUD->delete_view($req);
	}
	public function get_count() {
		$res = $this->itemCRUD->get_count();
		echo json_encode($res);
	}
	function import_excel()
	{
        $this->load->helper('file');

        /* Allowed MIME(s) File */
        $file_mimes = array(
            'application/octet-stream', 
            'application/vnd.ms-excel', 
            'application/x-csv', 
            'text/x-csv', 
            'text/csv', 
            'application/csv', 
            'application/excel', 
            'application/vnd.msexcel', 
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if(isset($_FILES['uploadFile']['name']) && in_array($_FILES['uploadFile']['type'], $file_mimes)) {

            $array_file = explode('.', $_FILES['uploadFile']['name']);
            $extension  = end($array_file);

            if('csv' == $extension) {
                $reader = new PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['uploadFile']['tmp_name']);
            $sheet_data  = $spreadsheet->getActiveSheet(0)->toArray();
            $array_data  = [];

            for($i = 1; $i < count($sheet_data); $i++) {
				// var_dump($sheet_data[$i]);
                $data = array(
                    'name' => $sheet_data[$i]['0'],
                    'zipcode' => $sheet_data[$i]['6'],
                    'housingContactEmail' => $sheet_data[$i]['9'],
                    'payPerNight' => $sheet_data[$i]['13'],
                    'contactName' => $sheet_data[$i]['16'],
                    'email' => $sheet_data[$i]['18'],
                    'additionalContact' => $sheet_data[$i]['19'],
                );
                $array_data[] = $data;
            }
            if($array_data != '') {
                $this->itemCRUD->insert_transaction($array_data);
            }
            // $this->modal_feedback('success', 'Success', 'Data Imported', 'OK');
        } 
		// else {    
        //     $this->modal_feedback('error', 'Error', 'Import failed', 'Try again');
        // }
        redirect('ItemCRUD/westin');	
    }

	function search_result() {
		$this->load->helper('url');
        $this->load->view('default/header');
        $this->load->view('itemCRUD/search');
        $this->load->view('default/footer3');
	}
	function westin_history() {
		$postData = $this->input->post();
		
		$data = $this->itemCRUD->historyTable($postData);
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode($data);
	}

	function getPrice() {
		
		// $client = \Symfony\Component\Panther\Client::createChromeClient();

		// // Navigate to Google Maps
		
		// $crawler = $client->request('GET', 'https://www.google.com/maps/place/The+Westin+La+Paloma+Resort+%26+Spa/@32.3146686,-110.9264281,15z/data=!3m1!4b1!4m10!3m9!1s0x86d67263430b99bd:0x51cf2c190c1bd5f7!5m3!1s2023-11-28!4m1!1i2!8m2!3d32.3146509!4d-110.9161498!16s%2Fm%2F07gl_b5?entry=ttu');
		// $crawler->waitFor('searchbox-searchbutton');
		// var_dump($crawler);
		// // Interact with the page
		// $form = $crawler->selectButton('searchbox-searchbutton')->form();
		// $pageCrawler = $client->submit($form, ['q' => 'Westin la Paloma']);

		// var_dump($pageCrawler);
		// $client->close();
		// // Extract and process the data

		// // Output the result
		// return $pageCrawler;
		$ch = curl_init();

		// Set the URL
		curl_setopt($ch, CURLOPT_URL, 'https://www.marriott.com/en-us/hotels/tuswi-the-westin-la-paloma-resort-and-spa/overview/?scid=f2ae0541-1279-4f24-b197-a979c79310b0');

		// Set the HTTP method
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

		// Return the response instead of printing it out
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// Send the request and store the result in $response
		$response = curl_exec($ch);
		preg_match_all('/(\([0-9]{3}\)[\s-]?|[0-9]{3}-)[0-9]{3}-[0-9]{4}/',$response, $tel_matches);
		preg_match_all('/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/',$response, $mail_matches);

		echo 'HTTP Status Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) . PHP_EOL;
		echo 'Response Body: ' . $response . PHP_EOL;
		$tel = "";
		$tel_arr = [];
		$mail = "";
		$mail_arr = [];
		if (count($tel_matches[0]) != 0) {
			foreach($tel_matches[0] as $item) {
				$flag = false;
				foreach($tel_arr as $item1) {
					if($item == $item1) {
						$flag = true;
					}
				}
				if($flag == false) {
					$tel .= $item . ", ";
					$tel_arr[]  = $item;
				}
			}
		}
		if (count($mail_matches[0]) != 0) {
			foreach($mail_matches[0] as $item) {
				$flag = false;
				foreach($tel_arr as $item1) {
					if($item == $item1) {
						$flag = true;
					}
				}
				if($flag == false) {
					$mail .= $item . ", ";
					$mail_arr[]  = $item;
				}
			}
		}

		$res = array(
			'tel' => $tel,
			'mail' => $mail
		);

		print_r($res['tel']);
		print_r($tel_matches[0]);

		// Close cURL resource to free up system resources
		curl_close($ch);
	}

	public function backupDatabase() {
		$userName = "root";
		$password = "";
		$hostName = "127.0.0.1";
		$databaseName = "jobs";
		

		$backupPath = '/vendors/images/';
		$backupFileName = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
		
		$command = "mysqldump -u $userName -p$password -h $hostName $databaseName > $backupPath$backupFileName";
		
		exec($command);
		
		echo "Database backup created at: $backupPath$backupFileName";
	}
	public function chat_gpt() {
		$open_ai_key = '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';
		$open_ai = new OpenAi($open_ai_key);
		$new = $this->input->post();
		$chat = $open_ai->chat([
		'model' => 'gpt-3.5-turbo',
		'messages' => [
			[
				"role" => "system",
				"content" => "You are a helpful assistant."
			],
			[
				"role" => "user",
				"content" => "Who won the world series in 2020?"
			],
			[
				"role" => "assistant",
				"content" => "The Los Angeles Dodgers won the World Series in 2020."
			],
			[
				"role" => "user",
				"content" => $new['news']
			],
		],
		'temperature' => 1.0,
		'max_tokens' => 4000,
		'frequency_penalty' => 0,
		'presence_penalty' => 0,
		]);


		$d = json_decode($chat);
		// var_dump($d);
		header('Access-Control-Allow-Origin: *');
    	header("Content-Type: application/json");
		echo json_encode($d->choices[0]->message->content);
	}
}
