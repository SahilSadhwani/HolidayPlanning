<?php
include_once("db.php")
?>
  <div class="container">
   <div class="search-hotel-content">
   <form action="tp.php" method="POST">
    
    <label for="">Source</label>
    <select name="source_customize" id="source_customize">
    <option value=""></option>
    <option value="Delhi">Delhi</option>
    <?php
       $query = "SELECT * from static_packages";
        $result = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($result)){
            $id = $row["package_id"];
            $package_destination = $row["package_destination"];
            
            echo "<option value=\"$package_destination\">$package_destination</option>";
        }
       ?>
       </select>
    
    
    <label for="">Destination</label>
    <select name="destination_customize" id="destination_customize">
    <option value=""></option>
    <option value="Dubai">Dubai</option>
    <?php
       $query = "SELECT * from static_packages";
        $result = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($result)){
            $id = $row["package_id"];
            $package_destination = $row["package_destination"];
            
            echo "<option value=\"$package_destination\">$package_destination</option>";
        }
       ?>
       </select>
    
    <label for="date">Departure Date</label>
    <input type="date" min="2018-10-16" max="2019-06-10" id="date" name="departure_date_customize">
    
    <label for="date">Arrival Date</label>
    <input type="date" min="2018-10-16" max="2019-06-10" id="date" name="arrival_date_customize">
    
    <label for="num">Travellers</label>
    <input type="number" min="1" max="50" step="1" id="num" name="guest_customize">
    
    <label for="num">Rooms</label>
    <input type="number" min="1" max="50" step="1" id="num" name="room_customize">
    
    <label for="">Class</label>
    <select name="flight_class_customize" id="flight_class_customize">
        <option value="ECONOMY">ECONOMY</option>
        <option value="BUSINESS">BUSINESS</option>
    </select>
    
    <button type="submit" name="ajax" style="margin-left:150px;">Search</button>

    </form>
    </div>
    <script src="../js/script.js"></script>
</div>
