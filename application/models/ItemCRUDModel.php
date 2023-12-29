<?php


class ItemCRUDModel extends CI_Model{

	private $client;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function get_itemCRUD(){
        
        $query = $this->db->get("simplyhired");
        // var_dump($query->result());
        return $query->result();
    }

    public function get_indeed() {
        $query = $this->db->get("indeed");
        return $query->result();
    }
    public function get_careerjet() {
        $query = $this->db->get("careerjet");
        return $query->result();
    }
    public function get_jobisjob() {
        $query = $this->db->get("jobisjob");
        return $query->result();
    }
    public function get_usajobs() {
        $query = $this->db->get("usajobs");
        return $query->result();
    }
    public function get_jobsintrucks() {
        $query = $this->db->get("jobsintrucks");
        return $query->result();
    }
    public function get_alltruckjobs() {
        $query = $this->db->get("alltruckjobs");
        return $query->result();
    }
	public function get_coolworks() {
        $query = $this->db->get("coolworks");
        return $query->result();
    }
	public function get_westin() {
        $query = $this->db->get("westin");
        return $query->result();
    }
	public function select($req = array()) {
		// $res = array();
        $this->db->select('*');
        $this->db->like('dest_location', $req['location']);
        $record = $this->db->get('westin');
		// $query = $this->db->get_compiled_select();
		return $record->result();
        // return $res;
    }
	public function setInit($req, $type, $setting) {
		$this->db->where('type', 'location');
		$this->db->update('tbl_setting', array('value' => $setting['location']));
		$this->db->where('type', 'category');
		$this->db->update('tbl_setting', array('value' => $setting['category']));
		$this->db->where('type', 'radius');
		$this->db->update('tbl_setting', array('value' => $setting['radius']));
		
		// $this->db->where('id', 1);
		// $this->db->select('*');
		// $query = $this->db->get('tbl_title');
		// if(count($query->result()) != 0) {
		// 	$this->db->where('id', 1);
		// 	$this->db->update('tbl_title', array('title' => $req['location']));
		// }
		// else {
		// 	$list = array(
		// 		'title' => $req['location']
		// 	);
		// 	$this->db->insert('tbl_title', $list);
		// }
		// $this->db->from('westin');
		// $this->db->truncate();
		// $data = json_decode(stripslashes($req['list']));
		$res = array();
		$count = 0;
		$api_count = 0;
		foreach ($req['results'] as $i) {
			$this->db->select('*');
			$this->db->where('jobkey', $i['place_id']);
			$pos = $this->db->get('westin');
			if(count($pos->result()) == 0) {
				if(isset($i['rating']) != false || isset($i['vicinity']) != false || isset($i['types']) != false) {
					$mode = array('transit', 'driving', 'walking', 'bicycling');
					$direction = 0;
					$straight = "";
					$driving = "";
					$walking = "";
					$transit = "";
					$bicycling = "";
					$website = "";
					$phone_number = "";
					$rating = "";
					$vicinity = "";
					$types = "";
					if(isset($i['rating']) != false) {
						$rating = $i['rating'];
					}
					if(isset($i['vicinity']) != false) {
						$vicinity = $i['vicinity'];
					}
					if(isset($i['types']) != false) {
						$types = $i['types'];
					}
	
					// $client = new Google_Client();
					// $this->load->library('google_hotel_api');
	
					// Call the getPerNightPrices method
					// $hotelPlaceId = $i['place_id'];
					// $today_date = date("Y-m-d");
					// $day = date("d") + 1;
					// $tome_date = date("Y-m") . "-" . $day;
					// $checkInDate = $today_date;
					// $checkOutDate = $tome_date;
					// $perNightPrices = $this->google_hotel_api->getPerNightPrices($hotelPlaceId, $checkInDate, $checkOutDate);
	
					// Do something with the per night prices
					// var_dump($perNightPrices);
					
					$encodedUrl = urldecode('https://maps.googleapis.com/maps/api/place/details/json?key=AIzaSyDs-0kCpaWs6MLA3beRKO690-NdIL_ubn0&placeid='.$i["place_id"]);
					$dp = file_get_contents($encodedUrl);
					if($dp != false) {
						$count++;
		
						$dpk = json_decode($dp, true);
						if(isset($dpk['result']['international_phone_number'])) {
							$phone_number = $dpk['result']['international_phone_number'];
						}
						if(isset($dpk['result']['website'])) {
							$website = $dpk['result']['website'];
						}
						if($setting['allow'] == 'yes') {
							foreach($mode as $item) {
								$encodedUrl1 = urldecode('https://maps.googleapis.com/maps/api/directions/json?origin='.$setting["lat"].','.$setting["lng"].'&destination='.$i["geometry"]["location"]["lat"].','.$i["geometry"]["location"]["lng"].'&mode='.$item.'&key=AIzaSyDs-0kCpaWs6MLA3beRKO690-NdIL_ubn0');
								$dd = file_get_contents($encodedUrl1);
								if( $dd != false ) {
									$count++;
									$direction = round($this->getDistance($i['geometry']['location'],  $setting), 0);
									$dist = json_decode($dd, true);
									if($item == "transit") {
										// if(isset($dist['routes']['legs'][0]['distance']['text'])) {
										// 	$direction = $dist['routes']['legs'][0]['distance']['text'];
										// }
										if(isset($dist['routes'][0]['legs'][0]['duration']['text'])) {
											$transit = $dist['routes'][0]['legs'][0]['duration']['text'];
										}
									}
									else if($item == "driving") {
										if(isset($dist['routes'][0]['legs'][0]['distance']['text'])) {
											$straight = $dist['routes'][0]['legs'][0]['distance']['text'];
										}
										if(isset($dist['routes'][0]['legs'][0]['duration']['text'])) {
											$driving = $dist['routes'][0]['legs'][0]['duration']['text'];
										}															
									}
									else if($item == "walking") {
										if(isset($dist['routes'][0]['legs'][0]['distance']['text'])) {
											$straight = $dist['routes'][0]['legs'][0]['distance']['text'];
										}
										if(isset($dist['routes'][0]['legs'][0]['duration']['text'])) {
											$walking = $dist['routes'][0]['legs'][0]['duration']['text'];
										}
									}
									else if($item == "bicycling") {
										// if(isset($dist['routes']['legs'][0]['distance']['text'])) {
										// 	$direction = $dist['routes']['legs'][0]['distance']['text'];
										// }
										if(isset($dist['routes'][0]['legs'][0]['duration']['text'])) {
											$bicycling = $dist['routes'][0]['legs'][0]['duration']['text'];
										}
									}
								}
							}
						}
					}
					$photo = "";
					if( isset($i['photos'][0]['html_attributions'][0]) != false ) {
						$photo = $i['photos'][0]['html_attributions'][0];
					}
					$tel_mail = $this->getTel($website);
					$res = array(
						'title' => $i['name'],
						'latitude' => $i['geometry']['location']['lat'],
						'longitude' => $i['geometry']['location']['lng'],
						'jobkey' => $i['place_id'],
						'type' => $type,
						'level' => $rating,
						'review' => $i['user_ratings_total'],
						'dest_location' => $vicinity,
						'transit_time' => $transit,
						'driving_time' => $driving,
						'walking_time' => $walking,
						'cycling_time' => $bicycling,
						'direction' => $direction,
						'straight' => $straight,
						'website' => $website,
						'phoneNumber' => $phone_number,
						'photo' => $photo,
						'email' => $tel_mail['mail'],
						'additionalContact' => $tel_mail['tel'],
					);
					if( $direction < intval($setting['radius'])) {
						$this->db->select('*');
						$this->db->where('title', $i['name']);
						if( count($this->db->get('westin')->result()) != 0) {
							$this->db->where('title', $i['name']);
							$this->db->update('westin', $res);
						}
						else {
							$this->db->insert('westin', $res);
						}
					}
				}
			}
		}
		$api_count = $this->api_count($count);
		$this->db->where('type', 'end');
		$this->db->update('tbl_setting', array('value' => '1'));
		return true;

	}
	public function setInitAgain($req = array()) {
		$this->db->where('type', 'location');
		$this->db->update('tbl_setting', array('value' => $req['location']));
		$this->db->where('id', 1);
		$this->db->update('tbl_title', array('title' => $req['location']));
		return true;
	}

	public function format1() {
		$this->db->from('westin');
		$this->db->truncate();

		return true;
	}
	public function getTable($postData = null) {
		$res = array();

		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		$searchQuery = "";
		if($searchValue != ''){
			if(count(explode(',', $searchValue)) == 1) {
				$searchQuery = " (title like '%".bin2hex($searchValue)."%' or 
						dest_location like '%".bin2hex($searchValue)."%' ) ";
			}
			else {
				if (explode(',', $searchValue) == "driving") {
					$searchQuery = " (driving_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "walking") {
					$searchQuery = " (walking_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "cycling") {
					$searchQuery = " (cycling_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "transit") {
					$searchQuery = " (trnasit_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "pay") {
					$searchQuery = " (payPerNight <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "direction") {
					$searchQuery = " (direction <= '".explode(',', $searchValue)[1]."' ) ";
				}
			}
		}

		$this->db->select('count(*) as allcount');
		$records = $this->db->get('westin')->result();
		$totalRecords = $records[0]->allcount;

		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('westin')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		$this->db->select('*');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		if($columnName == 'location') {
			$this->db->order_by('dest_location', $columnSortOrder);
		}
		else {
			$this->db->order_by($columnName, $columnSortOrder);
		}
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('westin')->result();

		$data = array();
		$sn = 1;
		foreach($records as $record ){
		   
			$data[] = array( 
				"action" => "<input type='checkbox' class='delete_check' id='delcheck_".$record->id."' onclick='checkcheckbox();' value='".$record->id."'>",
				"id"=> $sn,
				"title"=>$record->title,
				"review"=>$record->review,
				"type"=>$record->type,
				"rating"=>$record->rating,
				"level"=>$record->level,
				"location"=>$record->dest_location,
				"email"=>$record->email,
				"photo"=>$record->photo,
				"direction"=>$record->direction,
				"straight"=>$record->straight,
				"driving_time"=>$record->driving_time,
				"walking_time"=>$record->walking_time,
				"transit_time"=>$record->transit_time,
				"cycling_time"=>$record->cycling_time,
				"latitude"=>$record->latitude,
				"longitude"=>$record->longitude,
				"payPerNight"=>$record->payPerNight,
				"website"=>$record->website,
				"phonenumber"=>$record->phoneNumber,
				"zipcode"=>$record->zipcode,
				"contactName"=>$record->contactName,
				"housingContactEmail"=>$record->housingContactEmail,
				"additionalContact"=>$record->additionalContact,
				"amenities"=>$record->amenities,
				"details"=>$record->details
			); 
			$sn++;
		}
  
		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
  
		return $response; 
	}

	public function searchTable($postData = null) {
		$res = array();

		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		$searchQuery = "";
		if($searchValue != ''){
			if(count(explode(',', $searchValue)) == 1) {
				$searchQuery = " (title like '%".bin2hex($searchValue)."%' or 
						dest_location like '%".bin2hex($searchValue)."%' ) ";
			}
			else {
				if (explode(',', $searchValue) == "driving") {
					$searchQuery = " (driving_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "walking") {
					$searchQuery = " (walking_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "cycling") {
					$searchQuery = " (cycling_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "transit") {
					$searchQuery = " (trnasit_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "pay") {
					$searchQuery = " (payPerNight <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "direction") {
					$searchQuery = " (direction <= '".explode(',', $searchValue)[1]."' ) ";
				}
			}
		}

		$this->db->select('count(*) as allcount');
		$records = $this->db->get('westin_search')->result();
		$totalRecords = $records[0]->allcount;

		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('westin_search')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		$this->db->select('*');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		if($columnName == 'location') {
			$this->db->order_by('dest_location', $columnSortOrder);
		}
		else {
			$this->db->order_by($columnName, $columnSortOrder);
		}
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('westin_search')->result();

		$data = array();
		$sn = 1;
		foreach($records as $record ){
		   
			$data[] = array( 
				"id"=> $sn,
				"title"=>$record->title,
				"review"=>$record->review,
				"type"=>$record->type,
				"rating"=>$record->rating,
				"level"=>$record->level,
				"location"=>$record->dest_location,
				"photo"=>$record->photo,
				"direction"=>$record->direction,
				"straight"=>$record->straight,
				"driving_time"=>$record->driving_time,
				"walking_time"=>$record->walking_time,
				"transit_time"=>$record->transit_time,
				"cycling_time"=>$record->cycling_time,
				"latitude"=>$record->latitude,
				"longitude"=>$record->longitude,
				"payPerNight"=>$record->payPerNight,
				"website"=>$record->website,
				"phonenumber"=>$record->phoneNumber,
				"zipcode"=>$record->zipcode,
				"contactName"=>$record->contactName,
				"housingContactEmail"=>$record->housingContactEmail,
				"additionalContact"=>$record->additionalContact,
				"amenities"=>$record->amenities,
				"details"=>$record->details,
				// "id"=> $sn,
				// "title"=>pack("H*",$record->title),
				// "review"=>pack("H*",$record->review),
				// "type"=>pack("H*",$record->type),
				// "rating"=>pack("H*",$record->rating),
				// "level"=>pack("H*",$record->level),
				// "location"=>pack("H*",$record->dest_location),
				// "photo"=>pack("H*",$record->photo),
				// "direction"=>pack("H*",$record->direction),
				// "straight"=>pack("H*",$record->straight),
				// "driving_time"=>pack("H*",$record->driving_time),
				// "walking_time"=>pack("H*",$record->walking_time),
				// "transit_time"=>pack("H*",$record->transit_time),
				// "cycling_time"=>pack("H*",$record->cycling_time),
				// "latitude"=>pack("H*",$record->latitude),
				// "longitude"=>pack("H*",$record->longitude),
				// "payPerNight"=>pack("H*",$record->payPerNight),
				// "website"=>pack("H*",$record->website),
				// "phonenumber"=>pack("H*",$record->phoneNumber),
				// "zipcode"=>pack("H*",$record->zipcode),
				// "contactName"=>pack("H*",$record->contactName),
				// "housingContactEmail"=>pack("H*",$record->housingContactEmail),
				// "additionalContact"=>pack("H*",$record->additionalContact),
				// "amenities"=>pack("H*",$record->amenities),
				// "details"=>pack("H*",$record->details),
			); 
			$sn++;
		}
  
		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
  
		return $response; 
	}

	public function viewTable($postData, $id) {
		$res = array();
		
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		$searchQuery = "";
		if($searchValue != ''){
			if(count(explode(',', $searchValue)) == 1) {
				$searchQuery = " (history_id = '". bin2hex($id) ."' and (title like '%".bin2hex($searchValue)."%' or 
						dest_location like '%".bin2hex($searchValue)."%' )) ";
			}
			else {
				if (explode(',', $searchValue) == "driving") {
					$searchQuery = " (driving_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "walking") {
					$searchQuery = " (walking_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "cycling") {
					$searchQuery = " (cycling_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "transit") {
					$searchQuery = " (trnasit_time <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "pay") {
					$searchQuery = " (payPerNight <= '".explode(',', $searchValue)[1]."' ) ";
				}
				else if (explode(',', $searchValue) == "direction") {
					$searchQuery = " (direction <= '".explode(',', $searchValue)[1]."' ) ";
				}
			}
		}
		$this->db->select('count(*) as allcount');
		$this->db->where('history_id', bin2hex($id));
		$records = $this->db->get('westin_save')->result();
		$totalRecords = $records[0]->allcount;
		$this->db->select('count(*) as allcount');
		if($searchQuery != ''){
			$this->db->where($searchQuery);
		}
		else{
			$this->db->where('history_id', bin2hex($id));
		}
		$records = $this->db->get('westin_save')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		$this->db->select('*');
		if($searchQuery != ''){
			$this->db->where($searchQuery);
		}
		else{
			$this->db->where('history_id', bin2hex($id));
		}
		if($columnName == 'location') {
			$this->db->order_by('dest_location', $columnSortOrder);
		}
		else {
			$this->db->order_by($columnName, $columnSortOrder);
		}
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('westin_save')->result();

		$data = array();
		$sn = 1;
		foreach($records as $record ){
		   
			$data[] = array( 
				"id"=> $sn,
				"title"=>pack("H*",$record->title),
				"review"=>pack("H*",$record->review),
				"type"=>pack("H*",$record->types),
				"rating"=>pack("H*",$record->rating),
				"level"=>pack("H*",$record->level),
				"location"=>pack("H*",$record->dest_location),
				"email"=>pack("H*",$record->email),
				"photo"=>pack("H*",$record->photo),
				"direction"=>pack("H*",$record->direction),
				"straight"=>pack("H*",$record->straight),
				"driving_time"=>pack("H*",$record->driving_time),
				"walking_time"=>pack("H*",$record->walking_time),
				"transit_time"=>pack("H*",$record->transit_time),
				"cycling_time"=>pack("H*",$record->cycling_time),
				"latitude"=>pack("H*",$record->latitude),
				"longitude"=>pack("H*",$record->longitude),
				"payPerNight"=>pack("H*",$record->payPerNight),
				"website"=>pack("H*",$record->website),
				"phonenumber"=>pack("H*",$record->phoneNumber),
				"zipcode"=>pack("H*",$record->zipcode),
				"contactName"=>pack("H*",$record->contactName),
				"housingContactEmail"=>pack("H*",$record->housingContactEmail),
				"additionalContact"=>pack("H*",$record->additionalContact),
				"amenities"=>pack("H*",$record->amenities),
				"details"=>pack("H*",$record->details),
			); 
			$sn++;
		}
  
		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
  
		return $response; 
	}
	public function insert_title($req) {
		$data = array(
			'title'=>$req['data']
		);
		$this->db->insert('tbl_title', $data);
		return true;
	}
	public function select_title() {
		$query = $this->db->get("tbl_title");
        return $query->result();
	}
	public function update_title($req) {
		$this->db->update('tbl_title', array('title' => $req));
	}
	public function searchTitle() {
		
		$query = $this->db->get('tbl_title');
		return $query->result();
	}
	public function end() {
		$query = $this->db->get('tbl_setting');
		return $query->result();
	}
	public function save_result($req) {
		$this->db->select('*');
		$query = $this->db->get('tbl_setting');
		$set = $query->result();

		$data = array(
			'title' => $req['date'],
			'location' => $set[0]->value,
			'category' => $set[1]->value,
			'radius' => $set[2]->value,
			'create_at' => $req['datetime'],
		);
		$this->db->insert('tbl_history', $data);

		$this->db->select('*');
		$list = $this->db->get('westin');
		$list = $list->result();

		$this->db->select('*');
		$this->db->where('create_at', $req['datetime']);
		$history = $this->db->get('tbl_history');
		$history = $history->result();

		foreach($list as $i) {
			$a = [];
			$a['review'] = $i->review;
			$a['type'] = $i->type;
			$a['level'] = $i->level;
			$a['email'] = $i->email;
			$a['dest_location'] = $i->dest_location;
			$a['direction'] = $i->direction;
			$a['straight'] = $i->straight;
			$a['photo'] = $i->photo;
			$a['driving_time'] = $i->driving_time;
			$a['walking_time'] = $i->walking_time;
			$a['transit_time'] = $i->transit_time;
			$a['cycling_time'] = $i->cycling_time;
			$a['latitude'] = $i->latitude;
			$a['longitude'] = $i->longitude;
			$a['website'] = $i->website;
			$a['phoneNumber'] = $i->phoneNumber;
			$a['zipcode'] = $i->zipcode;
			$a['housingContactEmail'] = $i->housingContactEmail;
			$a['contactName'] = $i->contactName;
			$a['details'] = $i->details;
			$a['amenities'] = $i->amenities;
			$a['additionalContact'] = $i->additionalContact;
			$a['email'] = $i->email;
			if($i->review == null) {
				$a['review'] = '';
			}
			if($i->type == null) {
				$a['type'] = '';
			}
			if($i->level == null) {
				$a['level'] = '';
			}
			if($i->rating == null) {
				$a['rating'] = '';
			}if($i->email == null) {
				$a['email'] = '';
			}if($i->dest_location == null) {
				$a['dest_location'] = '';
			}if($i->direction == null) {
				$a['direction'] = '';
			}if($i->payPerNight == null) {
				$a['payPerNight'] = '';
			}if($i->straight == null) {
				$a['straight'] = '';
			}if($i->photo == null) {
				$a['photo'] = '';
			}if($i->driving_time == null) {
				$a['driving_time'] = '';
			}if($i->walking_time == null) {
				$a['walking_time'] = '';
			}if($i->transit_time == null) {
				$a['transit_time'] = '';
			}if($i->cycling_time == null) {
				$a['cycling_time'] = '';
			}if($i->latitude == null) {
				$a['latitude'] = '';
			}if($i->longitude == null) {
				$a['longitude'] = '';
			}if($i->website == null) {
				$a['website'] = '';
			}if($i->phoneNumber == null) {
				$a['phoneNumber'] = '';
			}if($i->zipcode == null) {
				$a['zipcode'] = '';
			}if($i->housingContactEmail == null) {
				$a['housingContactEmail'] = '';
			}if($i->contactName == null) {
				$a['contactName'] = '';
			}if($i->additionalContact == null) {
				$a['additionalContact'] = '';
			}if($i->details == null) {
				$a['details'] = '';
			}if($i->amenities == null) {
				$a['amenities'] = '';
			}
			if($i->email == null) {
				$a['email'] = '';
			}
			$save = array(
				"title"=>bin2hex($i->title),
				"review"=>bin2hex($a['review']),
				"types"=>bin2hex($a['type']),
				"level"=>bin2hex($a['level']),
				"rating"=>bin2hex($a['rating']),
				"email"=>bin2hex($a['email']),
				"dest_location"=>bin2hex($a['dest_location']),
				"direction"=>bin2hex($a['direction']),
				"payPerNight"=>bin2hex($a['payPerNight']),
				"straight"=>bin2hex($a['straight']),
				"photo"=>bin2hex($a['photo']),
				"driving_time"=>bin2hex($a['driving_time']),
				"walking_time"=>bin2hex($a['walking_time']),
				"transit_time"=>bin2hex($a['transit_time']),
				"cycling_time"=>bin2hex($a['cycling_time']),
				"latitude"=>bin2hex($a['latitude']),
				"longitude"=>bin2hex($a['longitude']),
				"jobkey"=>$i->jobkey,
				// "payPerNight"=>$i->payPerNight,
				"website"=>bin2hex($a['website']),
				"phoneNumber"=>bin2hex($a['phoneNumber']),
				// "amenities"=>$i->amenities,
				"history_id"=>bin2hex($history[0]->id),
				"zipcode"=>bin2hex($a['zipcode']),
				"housingContactEmail"=>bin2hex($a['housingContactEmail']),
				"contactName"=>bin2hex($a['contactName']),
				"additionalContact"=>bin2hex($a['additionalContact']),
				"details" => bin2hex($a['details']),
				"amenities" =>bin2hex( $a['amenities']),
				"email" =>bin2hex( $a['email']),
			);
			// $this->db->select('*');
			// $this->db->where('jobkey', $i->jobkey);
			// $res = $this->db->get('westin_save');
			// if(count($res->result()) == 0) {
				$this->db->insert('westin_save', $save);
			// }
		}
		$this->db->from('westin');
		$this->db->truncate();
		return true;
	}
	public function history() {
		$this->db->select('*');
		$query = $this->db->get('tbl_history');
		return $query->result();
	}
	public function init() {
		$this->db->from('tbl_title');
		$this->db->truncate();
		return true;
	}
	public function excel_view($id) {
		$this->db->select('title, review, rating, types,level, dest_location, website, email, phoneNumber, direction, straight, latitude, longitude, driving_time, transit_time, walking_time, cycling_time, photo, zipcode, housingContactEmail, contactName, additionalContact');
		$this->db->where('history_id', bin2hex($id));
		$query = $this->db->get('westin_save');
		$array = [];
		foreach ($query->result() as $i) {
			$res = array(
				"title"=>pack("H*",$i->title),
				"review"=>pack("H*",$i->review),
				"types"=>pack("H*",$i->types),
				"level"=>pack("H*",$i->level),
				"rating"=>pack("H*",$i->rating),
				"dest_location"=>pack("H*",$i->dest_location),
				"direction"=>pack("H*",$i->direction),
				"email"=>pack("H*",$i->email),
				"straight"=>pack("H*",$i->straight),
				"photo"=>pack("H*",$i->photo),
				"driving_time"=>pack("H*",$i->driving_time),
				"walking_time"=>pack("H*",$i->walking_time),
				"transit_time"=>pack("H*",$i->transit_time),
				"cycling_time"=>pack("H*",$i->cycling_time),
				"latitude"=>pack("H*",$i->latitude),
				"longitude"=>pack("H*",$i->longitude),
				"website"=>pack("H*",$i->website),
				"phoneNumber"=>pack("H*",$i->phoneNumber),
				"zipcode"=>pack("H*",$i->zipcode),
				"housingContactEmail"=>pack("H*",$i->housingContactEmail),
				"contactName"=>pack("H*",$i->contactName),
				"additionalContact"=>pack("H*",$i->additionalContact),
			);
			$array[] = $res;
		}
		return $array;
	}
	public function delete_view($req) {
		$data = $req['deleteids_arr'];
		foreach($data as $item) {
			$this->db->where('id', $item);
			$this->db->delete('westin');
		}
		return true;
	}
	public function api_count($count){
		$this->db->where('type', 'api_count');
		$query = $this->db->get('tbl_setting')->result();
		$value = $query[0]->value + $count;
		$this->db->where('type', 'api_count');
		$this->db->update('tbl_setting', array('value'=>$value));
		return $value;
	}
	public function get_count() {
		$this->db->select('*');
		$this->db->where('type', 'api_count');
		$query = $this->db->get('tbl_setting');
		return $query->result();
	}
	public function rad($x) {
		return $x * 3.14 / 180;
	}
	public function getDistance($p1, $p2) {
		$R = 6370000; // Earth’s mean radius in meter
		$dLat = $this->rad(floatval($p2['lat']) - floatval($p1['lat']));
		$dLong = $this->rad(floatval($p2['lng']) - floatval($p1['lng']));
		$a = asin($dLat / 2) * asin($dLat / 2) +
	  	acos($this->rad($p1['lat'])) * acos($this->rad($p2['lat'])) *
		asin($dLong / 2) * asin($dLong / 2);
		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
		$d = $R * $c;
		return $d; // returns the distance in meter
	}

	public function test_api () {
		// $client = new Google_Client();
		$this->load->library('google_hotel_api');

		// Call the getPerNightPrices method
		$hotelPlaceId = 'ChIJbYQWdh-t2YgRY5RXWxyu4n0';
		$today_date = date("Y-m-d");
		$day = date("d") + 1;
		$tome_date = date("Y-m") . "-" . $day;
		$checkInDate = $today_date;
		$checkOutDate = $tome_date;
		$perNightPrices = $this->google_hotel_api->getPerNightPrices($hotelPlaceId, $checkInDate, $checkOutDate);

		// Do something with the per night prices
		var_dump($perNightPrices);
		return $perNightPrices;
	}

	public function insert_transaction($data) {
		foreach ($data as $item) {
			$this->db->select('*');
			$this->db->where('title', $item['name']);
			$res = $this->db->get('westin')->result();
			if(count($res) != 0) {
				$this->db->where_in('title', $item['name']);
				$this->db->update('westin', array(
					'zipcode' => $item['zipcode'],
					'housingContactEmail' => $item['housingContactEmail'],
					'contactName' => $item['contactName'],
					'additionalContact' => $item['additionalContact'],
					'email' => $item['email'],
					'payPerNight' => $item['payPerNight'],
				));
			}
		}
	}

	public function historyTable($postData = null) {
		$res = array();

		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		$searchQuery = "";
		if($searchValue != ''){
			if(count(explode(',', $searchValue)) == 1) {
				$searchQuery = " (title like '%".$searchValue."%') ";
			}
		}

		$this->db->select('count(*) as allcount');
		$records = $this->db->get('tbl_history')->result();
		$totalRecords = $records[0]->allcount;

		$this->db->select('count(*) as allcount');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		$records = $this->db->get('tbl_history')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		$this->db->select('*');
		if($searchQuery != '')
		$this->db->where($searchQuery);
		
		$this->db->order_by($columnName, $columnSortOrder);
		
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('tbl_history')->result();

		$data = array();
		$sn = 1;
		foreach($records as $record ){
		   
			$data[] = array( 
				"id"=> $sn,
				"title"=>$record->title,
				"location"=>$record->location,
				"category"=>$record->category,
				"radius"=>$record->radius,
				"view"=>'<a href="'. site_url().'/ItemCRUD/view_list/'.$record->id.'" class="btn-view" style=" width: 50px; height: 30px; color: dodgerblue; border: 0px">View</a>',
			); 
			$sn++;
		}
  
		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data
		);
  
		return $response; 
	}
	function getTel($url) {
		
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
		// $ch = curl_init();

		// // Set the URL
		// curl_setopt($ch, CURLOPT_URL,  $url);

		// // Set the HTTP method
		// curl_setopt($ch, CURLOPT_HEADER, 0);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 100000);
		// // Return the response instead of printing it out

		// // Send the request and store the result in $response
		// $response = curl_exec($ch);
		try {
			$response = curl_get_contents(str_replace('&amp;', '&', $url));
		}
		catch( Exception $e) {
			$response = '';
		}
		preg_match_all('/(\([0-9]{3}\)[\s-]?|[0-9]{3}-)[0-9]{3}-[0-9]{4}/',$response, $tel_matches);
		preg_match_all('/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/',$response, $mail_matches);
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
				foreach($mail_arr as $item1) {
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
		// curl_close($ch);
		// $contact_list = ['contact', 'about', 'about-us', 'contact-us'];

		// if($tel == "" || $mail == "" ) {
		// 	foreach ($contact_list as $con) {
		// 		$ch = curl_init();

		// 		// Set the URL
		// 		curl_setopt($ch, CURLOPT_URL,  $url . $con);

		// 		// Set the HTTP method
		// 		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

		// 		// Return the response instead of printing it out
		// 		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		// 		// Send the request and store the result in $response
		// 		$response = curl_exec($ch);
		// 		preg_match_all('/(\([0-9]{3}\)[\s-]?|[0-9]{3}-)[0-9]{3}-[0-9]{4}/',$response, $tel_matches);
		// 		preg_match_all('/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/',$response, $mail_matches);
		// 		if (count($tel_matches[0]) != 0) {
		// 			foreach($tel_matches[0] as $item) {
		// 				$flag = false;
		// 				foreach($tel_arr as $item1) {
		// 					if($item == $item1) {
		// 						$flag = true;
		// 					}
		// 				}
		// 				if($flag == false) {
		// 					$tel .= $item . ", ";
		// 					$tel_arr[]  = $item;
		// 				}
		// 			}
		// 		}
		// 		if (count($mail_matches[0]) != 0) {
		// 			foreach($mail_matches[0] as $item) {
		// 				$flag = false;
		// 				foreach($mail_arr as $item1) {
		// 					if($item == $item1) {
		// 						$flag = true;
		// 					}
		// 				}
		// 				if($flag == false) {
		// 					$mail .= $item . ", ";
		// 					$mail_arr[]  = $item;
		// 				}
		// 			}
		// 		}
		// 	}
		// }

		$res = array(
			'tel' => $tel,
			'mail' => $mail
		);

		// Close cURL resource to free up system resources
		curl_close($ch);
		return $res;
	}
}
