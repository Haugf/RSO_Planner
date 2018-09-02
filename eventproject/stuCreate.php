
 <html>
 <header>
   <link rel="stylesheet" href="css/style.css"  />
   <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

 </header>
 <body>
   <div id="wrapper">
     <div id="menu2">
       <a href="feed.php">Feed</a>
       <a href="search.html">Search Event</a>
       <a href="rso.php">RSOs</a>
       <a href="create.php">Create Event</a>
       <a href="login.php">Log out</a>
     </div>

     <div id="note">
      <strong> You are not the admin of any RSO.</strong> You can request to create an event. This information will be sent to your univeristy super admin for review before being uploaded to the site.
     </div>
     <div id="formDiv">
       <form method="POST" action="stuCreateReturn.php" enctype="multipart/form-data">

       <label>Event Name:</label><br/>
               <input type="text" name="eventName"/><br/><br/>

       <label>Type:</label><br/>
       <select class="inputFields" name="type">
         <option value="social">Social</option>
         <option value="fundrasing">Fundrasing</option>
         <option value="technical">Technical</option>
       </select><br><br>

       <label>Time:</label><br/>
               <input type="text" name="time"/><br/><br/>

       <label>Date:</label><br/>
               <input type="date" name="date"/><br/><br/>

       <label>Scope:</label><br>
               <select class="inputFields" name="scope">
                 <option value="private">Private</option>
                 <option value="public">Public</option>
               </select><br><br>
       <label>Location:</label><br/>
               <input type="text" name="address" id="address2"/><br/><br/>

       <label>Contact Number:</label><br/>
               <input type="text" name="Num" id="address2"/><br/><br/>

       <label>Short Description:</label><br/>
               <input type="text" name="Des" id="address2"/><br/><br/>


               <input type="submit" class="theButtons" name="submit"/>

       </form>
     </div>
   </div>
 </body>
 </html>
