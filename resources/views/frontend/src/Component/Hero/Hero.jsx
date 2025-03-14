import React from 'react'
import './Hero.css';
import hand_icon from '../Assests/hand_icon.png';
import arrow_icon from '../Assests/arrow.png';
import hero_img from '../Assests/hero_image.png';
function Hero() {
  return (
    <div className='hero'>
        <div className="hero-left">
            <h2>
                Bajaj
            </h2>
                <div>
                    <div className="hero-hand-icon">
                        <p>new</p>
                        <img src={hand_icon} alt="" />
                    </div>
                    <p>Collections</p>
                    <p>For Bajaj Vehicle</p>
                </div>
                <div className="hero-latest-btn">
                    <div>All Bajaj Spare Parts</div>
                    <img src={arrow_icon} alt="" />
                </div>

        </div>
        <div className="hero-right">
            <img src={hero_img} alt="" />
        </div>
    </div>
  )
}

export default Hero
