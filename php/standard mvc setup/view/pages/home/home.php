<?php include('view/includes/head.php'); ?>
  <div class="welkom">
    <div class="welkomText">
      <div class="welkomTextDiv">
      <h1>Welkom</h1>
      <p>Studenten van het ICT- lab Utrecht hebben in opdracht van Civity deze applicatie ontwikkeld,<br>
         die verkeersstromen naar de binnenstad van Amersfoort in kaart brengt.</p>
         <button class="welkomKnop button" type="button" name="button">Aan de slag!</button>
         <div class="logo-group">
           <img class="logo-civ" src="view/css/images/Civity.png" alt="Civity">
           <img class="logo" src="view/css/images/ICTlab.png" alt="ictlab">
           <img class="logo-a" src="view/css/images/amersfoortpn.png" alt="Amersfoort">
         </div>
      </div>
    </div>
  </div>

  <!--de kaart div met de benodigde js files-->
  <div class="wrapper">
    <div class="map" id="map"></div>
      <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
      <script src="/view/javascript/leaflet-routing-machine.js"></script>
      <div class="dashboard">
        <div class="knoppen">
          <form>
              Datum:
              <input type="date" class="datum" min="2016-03-01" max="2016-03-27" value="2016-03-01">
          </form>
          <label for="amount-time">Tijd</label>
          <input type="text" name="amount-time" id="amount-time" style="border: 0; color: #666666; font-weight: bold;" value="10:00 - 20:00" readonly/>
          <div id="slider-time"></div><br>
          <button class="garage button">Garages</button>
          <button class="info button">Verkeer de stad in</button>
          <!-- <button class="text button">Totaal</button> -->
            <p id="demo"></p>
            <p id="demo2"></p>
            <p id="demo3"></p>
            <p id="demo4"></p>
            <p id="demo5"></p>
            <p id="demo6"></p>
            <p id="demo7"></p>
            <p id="demo8"></p>
          </div>
      </div>
  </div>

  <div style="display:none">
    <!--standaard waarde van de slider-->
    <p class="begintijd">10:00</p>
    <p class="eindtijd">20:00</p>
    <p class="beginuren">10</p>
    <p class="einduren">20</p>
  </div>


<?php include('view/includes/footer.php'); ?>
