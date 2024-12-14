@extends('layouts.service')


@section('content')

<section class="container">
    <header>Vehicle Maintenance and Service Form</header>
    <form
      action="{{ route('maintain.store') }}"
      method="post"
      enctype="multipart/form-data"
      class="form"
    >
      @csrf
      <!-- Full Name -->
      <div class="input-box">
        <label>Full Name</label>
        <input
          type="text"
          name="full_name"
          placeholder="Enter full name"
          required
        />
      </div>

      <!-- Email Address -->
      <div class="input-box">
        <label>Email Address</label>
        <input
          type="email"
          name="email"
          placeholder="Enter email address"
          required
        />
      </div>

      <!-- Phone Number -->
      <div class="input-box">
        <label>Phone Number</label>
        <input
          type="text"
          name="phone"
          placeholder="Enter phone number"
          required
        />
      </div>

      <!-- Vehicle Information -->
      <div class="column">
        <div class="input-box">
          <label>Vehicle Type</label>
          <input
            type="text"
            name="vehicle_type"
            placeholder="Enter vehicle type"
            required
          />
        </div>
        <div class="input-box">
          <label>Vehicle Name</label>
          <input
            type="text"
            name="vehicle_name"
            placeholder="Enter vehicle name"
            required
          />
        </div>
        <div class="input-box">
          <label>Vehicle Number</label>
          <input
            type="text"
            name="vehicle_number"
            placeholder="Enter vehicle number"
            required
          />
        </div>
      </div>

      <!-- Maintenance and Repair -->
      <div class="input-box">
        <label>Maintenance and Repair Services</label>
        <div class="checkbox-group">
          <div>
            <input type="checkbox" id="oil-change" name="maintenance_services" value="Oil Change" />
            <label for="oil-change">Oil Change</label>
          </div>
          <div>
            <input type="checkbox" id="tire-replacement" name="maintenance_services" value="Tire Replacement" />
            <label for="tire-replacement">Tire Replacement</label>
          </div>
          <div>
            <input type="checkbox" id="brake-services" name="maintenance_services" value="Brake Services" />
            <label for="brake-services">Brake Services</label>
          </div>
          <div>
            <input type="checkbox" id="fluid-checks" name="maintenance_services" value="Fluid Checks" />
            <label for="fluid-checks">Fluid Checks</label>
          </div>
          <div>
            <input type="checkbox" id="oil-filter-replacement" name="maintenance_service" value="Oil Filter Replacement" />
            <label for="oil-filter-replacement">Oil Filter Replacement</label>
          </div>
        </div>
      </div>

      <!-- Vehicle Wash -->
      <div class="input-box">
        <label>Vehicle Wash Type</label>
        <div class="select-box">
          <select name="wash_type" required>
            <option hidden>Select wash type</option>
            <option value="Basic">Basic</option>
            <option value="Full">Full</option>
            <option value="Detailing">Detailing</option>
            <option value="Premium">Premium</option>
          </select>
        </div>
      </div>

      <!-- Submit Button -->
      <button type="submit">Submit</button>
    </form>
  </section>

@endsection





@push('css')

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      min-height: 100%;
      display: flex;
      flex-direction: column;
      padding: 20px;
      background: linear-gradient(135deg, #003366, #002244);
      color: #333;
    }

    .container {
      flex: 1;
      position: relative;
      max-width: 800px;
      width: 100%;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      margin: auto;
    }

    .container header {
      font-size: 1.8rem;
      color: #003366;
      font-weight: 600;
      text-align: center;
      margin-bottom: 20px;
      text-transform: uppercase;
    }

    .container .form {
      margin-top: 20px;
    }

    .form .input-box {
      margin-bottom: 20px;
    }

    .input-box label {
      display: block;
      font-size: 0.9rem;
      font-weight: 500;
      color: #333;
      margin-bottom: 8px;
    }

    .input-box input,
    .select-box select {
      width: 100%;
      height: 45px;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 10px;
      font-size: 0.95rem;
      color: #555;
      transition: all 0.3s ease;
    }

    .input-box input:focus,
    .select-box select:focus {
      border-color: #003366;
      box-shadow: 0 0 5px rgba(0, 51, 102, 0.2);
    }

    .form .column {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .column .input-box {
      flex: 1;
      min-width: calc(50% - 10px);
    }

    .form .checkbox-group {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .checkbox-group div {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .checkbox-group label {
      font-size: 0.9rem;
      color: #555;
    }

    .form button {
      width: 100%;
      height: 50px;
      color: #fff;
      font-size: 1rem;
      font-weight: 500;
      background: #003366;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .form button:hover {
      background: #001d4d;
    }

    footer {
      background: #003366;
      color: #fff;
      text-align: center;
      padding: 10px 20px;
      position: relative;
      bottom: 0;
      width: 100%;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
      .column .input-box {
        min-width: 100%;
      }
    }
  </style>
@endpush
