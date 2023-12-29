
<div class="card-box pd-20 height-100-p mb-30">

  <div class="overlay" style="display: none;"></div>
  
  <p></p>
  <div id="map" style="display: none;"></div>
  
  <legend>Please select distance matrix API allow :</legend>
  <div>
    <input type="radio" id="yes" name="size" value="yes" checked/>
    <label for="yes">Yes</label>
  
    <input type="radio" id="no" name="size" value="no" />
    <label for="no">No</label>
    
  </div>
  <form id="startForm" class="form-inline" >
    
    <label for="location" id="location-lbl">Location:</label>
    <input type="text" id="location" placeholder="Example: Westin La Paloma" name="location">
    <label for="category">Category:</label>
    <input type="text" id="category" placeholder="Example: hotels,university" name="category">
    <label for="radius">Radius (metre) :</label>
    <input type="text" id="radius" placeholder="Example: 5000" name="radius">
    <button id="btn-start" style="margin-left: 30px">Start</button>
    <button id="btn-save">Save</button>
    <button id="btn_format">Clear</button>
    <button id="btn-delete">Delete</button>
  </form>
  
  <form id="upload-file" class="form-inline" enctype="multipart/form-data" method="post" action="<?= site_url()?>/ItemCRUD/import_excel">
    <label for="location" id="location-lbl">File Upload:</label>
    <input type="file" id="excel-file" placeholder="Choose Excel File" name="uploadFile" accept=".xlsx" required>
    <button type="submit" id>Upload</button>
  </form>
</div>


<div >
<table class="display dataTable" id="google-map">
    <thead>
    <tr>
        <th></th>
        <th>S.N</th>
        <th>Title</th>
        <th>Level</th>
        <th>Rate</th>
        <th>Review</th>
        <th>Type</th>
        <th>Location</th>
        <th>Email</th>
        <!-- <th>Price</th> -->
        <th>Straight (m)</th>
        <th>Direction (mile)</th>
        <th>
          <img src="<?php echo base_url('img/car.png'); ?>" alt="car">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </th>
        <th><img src="<?php echo base_url('img/walk.png'); ?>" alt="walk"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </th>
        <th><img src="<?php echo base_url('img/transit.png'); ?>" alt="transit">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
        <th><img src="<?php echo base_url('img/bike.png'); ?>" alt="bike">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Photo</th>
        <th>Website</th>
        <th>PhoneNumber</th>
        <th>ZipCode</th>
        <th>Housing Contact Email</th>
        <th>Contact Name</th>
        <th>Additional Contact</th>
        <th>Amenity</th>
        <th>Details</th>
    </tr>
    </thead>
    <!-- <tbody id="table-westin">
    
    </tbody> -->
</table>
<button type="button" class="btn btn-primary" style="opacity: 0; width: 0px;height: 0px" data-toggle="modal" data-target="#myModal"  id="btn-modal">
    Open modal
</button>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Location Search List</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		
	  	
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn-close">Close</button>
        <button type="button" class="btn btn-success" data-dismiss="modal" id="btn-ok">OK</button>
      </div>

    </div>
  </div>
</div>

<div>
  <div class="chatbody active">
    <section class="msger">
      <header class="msger-header">
        <div class="d-flex">
          <div class="msger-header-title">
            <img class="chatbotImg" src='<?php echo base_url(); ?>img/chatbot.png' alt="chatbotimg" />
          </div>
          <div class="ml-1 msger-header">
            <span>Support</span>
          </div>
        </div>
      </header>
      <main class="msger-chat"></main>
      <form class="msger-inputarea">
        <input
          type="text"
          class="msger-input"
          placeholder='Type your message...'
          height="10"
        />
        <button
          class="msger-send-btn"
          id="chat-submit"
        >
          <svg
            width="30"
            height="30"
            viewBox="0 0 24 24"
            fill="#04AA6D"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M22 2L11 13"
              stroke="white"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
            ></path>
            <path
              d="M22 2L15 22L11 13L2 9L22 2Z"
              stroke="white"
              strokeWidth="2"
              strokeLinecap="round"
              strokeLinejoin="round"
            ></path>
          </svg>
        </button>
      </form>
    </section>
  </div>
  <button
    id="chat-box"
    class="chatbot show-scroll"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 43.074 42.35"
      className="minimize-image_uj1BD"
      fill="white"
      width="20"
      height="20"
      id="chat-msg-svg"
    >
      <g data-name="Layer 2" transform="translate(-11.86 -14.678)">
        <path d="M27.041 53.253c-1.064-1.771-2.107-3.505-3.087-5.276-.352-.636-.583-.81-1.592-.794-3.331.035-3.326.035-4.38.027l-.549-.008c-3.594-.003-5.572-1.992-5.572-5.602V20.27c0-3.607 1.983-5.591 5.588-5.591h31.993c3.523 0 5.462 1.947 5.462 5.48.005 9.007.005 12.633 0 21.64a4.892 4.892 0 01-5.399 5.401h-.008l-5.515-.005c-6.442-.008-4.361-.018-8.483.021a1.099 1.099 0 00-.505.352c-1.059 1.71-2.067 3.45-3.074 5.192l-1.169 2.007c-.084.147-.179.292-.297.473l-1.161 1.79z"></path>
        <rect
          rx=".812"
          height="3.043"
          width="32.605"
          y="21.789"
          x="17.045"
          fill="#0596d4"
        ></rect>
        <rect
          rx=".812"
          height="3.043"
          width="32.605"
          y="29.228"
          x="17.045"
          fill="#0596d4"
        ></rect>
        <rect
          rx=".812"
          height="3.043"
          width="19.008"
          y="36.668"
          x="17.045"
          fill="#0596d4"
        ></rect>
      </g>
    </svg>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 448 512"
      className=""
      fill="white"
      width="15"
      height="15"
      id="chat-arrow"
    >
      <path d="M441.9 167.3l-19.8-19.8c-4.7-4.7-12.3-4.7-17 0L224 328.2 42.9 147.5c-4.7-4.7-12.3-4.7-17 0L6.1 167.3c-4.7 4.7-4.7 12.3 0 17l209.4 209.4c4.7 4.7 12.3 4.7 17 0l209.4-209.4c4.7-4.7 4.7-12.3 0-17z"></path>
    </svg>
  </button>
</div>

