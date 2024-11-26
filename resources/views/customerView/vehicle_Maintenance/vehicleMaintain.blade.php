<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Vehicle Maintenance and Services Form</title>
    <!-- Import Google Font -->
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: #003366;
      }

      .container {
        position: relative;
        max-width: 700px;
        width: 100%;
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      }

      .container header {
        font-size: 1.5rem;
        color: #333;
        font-weight: 500;
        text-align: center;
      }

      .container .form {
        margin-top: 30px;
      }

      .form .input-box {
        width: 100%;
        margin-top: 20px;
      }

      .input-box label {
        color: #333;
      }

      .form :where(.input-box input, .select-box) {
        position: relative;
        height: 20px;
        width: 100%;
        outline: none;
        font-size: 1rem;
        color: #707070;
        margin-top: 8px;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 15 px;
      }

      .input-box input:focus {
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
      }

      .form .column {
        display: flex;
        column-gap: 15 px;
      }

      .form button {
        height: 75px;
        width: 100%;
        color: #fff;
        font-size: 1rem;
        font-weight: 400;
        margin-top: 30px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #003366;
      }

      .form button:hover {
        background: #002244;
      }

      /* Responsive */
      @media screen and (max-width: 500px) {
        .form .column {
          flex-wrap: wrap;
        }
      }
    </style>
  </head>
  <body>
    <section class="container">
      <header>Vehicle Maintenance and Service Form</header>
      <form action="{ {route('maintain.store')} }" method="post" enctype="multipart/form"  class="form">
        @csrf
        <!-- Full Name -->
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter full name" required />
        </div>

        <!-- Email Address -->
        <div class="input-box">
          <label>Email Address</label>
          <input type="text" placeholder="Enter email address" required />
        </div>

        <!-- Phone Number -->
        <div class="input-box">
          <label>Phone Number</label>
          <input type="number" placeholder="Enter phone number" required />
        </div>

        <!-- Vehicle Information -->
        <div class="column">
          <div class="input-box">
            <label>Vehicle Type</label>
            <input type="text" placeholder="Enter vehicle type" required />
          </div>
          <div class="input-box">
            <label>Vehicle Name</label>
            <input type="text" placeholder="Enter vehicle name" required />
          </div>
          <div class="input-box">
            <label>Vehicle No</label>
            <input type="text" placeholder="Enter vehicle number" required />
          </div>
        </div>

        <!-- Vehicle Maintenance and Repair -->
        <div class="input-box">
          <label>Maintenance and Repair Services</label>
          <div>
            <input type="checkbox" id="oil-change" name="service" />
            <label for="oil-change">Oil Change</label>
          </div>
          <div>
            <input type="checkbox" id="tire-replacement" name="service" />
            <label for="tire-replacement">Tire Replacement</label>
          </div>
          <div>
            <input type="checkbox" id="brake-services" name="service" />
            <label for="brake-services">Brake Services</label>
          </div>
          <div>
            <input type="checkbox" id="fluid-checks" name="service" />
            <label for="fluid-checks">Fluid Checks</label>
          </div>
          <div>
            <input type="checkbox" id="oil-filter-replacement" name="service" />
            <label for="oil-filter-replacement">Oil Filter Replacement</label>
          </div>
        </div>

        <!-- Vehicle Wash -->
        <div class="input-box">
          <label>Vehicle Washes</label>
          <div class="select-box">
            <select required>
              <option hidden>Select wash type</option>
              <option>Basic</option>
              <option>Full</option>
              <option>Detailing</option>
              <option>Premium</option>
            </select>
          </div>
        </div>

        <!-- Submit Button -->
        <button>Submit</button>
      </form>
    </section>
  </body>
</html>
