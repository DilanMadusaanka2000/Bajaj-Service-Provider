import React, { useState } from 'react'
import logo from '../Assests/logo.png'
import cart_icon from '../Assests/cart_icon.png'
import './Navbar.css';
import { Link } from 'react-router-dom';
function Navbar() {
    const [menu,setMenu] = useState("home");
  return (
    <div className='navbar'>

        <div className="nav-logo">

            <img src={logo} alt="" />

            <p>BAJAJ</p>

        </div>

        <ul className='nav-menu'>
            <li onClick={()=>{setMenu("home")}}><Link style={{ textDecoration: 'none'}} to='/'>HOME</Link> {menu==="home"?<hr />:<></>}</li>
            <li onClick={()=>{setMenu("shop")}}>SHOP {menu==="shop"?<hr />:<></>}</li>
            <li onClick={()=>{setMenu("cart")}}><Link style={{ textDecoration: 'none'}} to='/cart'> CART </Link> {menu==="cart"?<hr />:<></>}</li>
            <li onClick={()=>{setMenu("about")}}>ABOUT {menu==="about"?<hr />:<></>}</li>
            <li onClick={()=>{setMenu("contact")}}>CONTACT {menu==="contact"?<hr />:<></>}</li>
        </ul>

          <div className="nav-login-cart">
            <button>Login</button>
            <img src={cart_icon} alt="" />
            <div className="nav-cart-count">0</div>
          </div>
    </div>
  )
}

export default Navbar
